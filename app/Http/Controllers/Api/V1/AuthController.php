<?php

namespace App\Http\Controllers\Api\V1;

use Mail;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\RecoveryPasswordRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $userByEmail = User::where('email', $request->email)->first();
        if(!$userByEmail) {
            return response()->json([
                'message' => trans('auth.email')
            ], 401);
        } 
        if(!Hash::check($request->password, $userByEmail->password)) {
            return response()->json([
                'message' => trans('auth.password')
            ], 401);
        }
        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)) {
            $user = $request->user();
            $permissions = self::setPermissions($user->role->name);
            $tokenData = $user->createToken($user->email.'-'.now(), $permissions);
            $token = $tokenData->token;
            
            if($request->remember_me) {
                $token->expires_at = Carbon::now()->addWeeks(1);
            }
            
            if($token->save()) {
                return response()->json([
                    'message' => trans('auth.entered'),
                    'user' => $user,
                    'token_type' => 'Bearer',
                    'access_token' => $tokenData->accessToken,
                    'token_scope' => $token->scopes,
                    'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
                ], 200);
            } 
            return response()->json([
                'message' => trans('auth.failed')
            ], 500);
        }
    }

    public function profile(Request $request) {
        if($user = $request->user()) {
            return response()->json($user->load('role'), 200);
        }
        return response()->json([
            'message' => trans('auth.failed')
        ], 500);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => trans('auth.exited')
        ], 200);
    }

    public function setPermissions($role) {
        switch($role) {
            case 'admin':
                return ['party', 'moder', 'admin'];
                break;
            case 'moderator':
                return ['party', 'moder'];
                break;
            case 'participant':
                return ['party'];
                break;
        }
    }

    public function recoveryPassword(RecoveryPasswordRequest $request) {
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return response()->json([
                'message' => trans('auth.email')
            ], 401);
        }
        $random = rand(000000, 999999);
        $user->verification_code = $random;
        if($user->save()) {
            Mail::to($request->email, $request->name)->send(new ResetPasswordMail([
                'email' => $user->email,
                'name' => $user->name,
                'random' => $random,
            ]));
            if (Mail::failures()) {
                return response()->json([
                    'message' => trans('auth.failed')
                ], 500);
            } else {
                return response()->json([
                    'message' => trans('auth.sending')
                ], 200);
            }
        } 
        return response()->json([
            'message' => trans('auth.failed')
        ], 500);  
    }

    public function resetPassword(ResetPasswordRequest $request) {
        $userByEmail = User::where('email', $request->email)->first();
        if(!$userByEmail) {
            return response()->json([
                'message' => trans('auth.email')
            ], 401);
        } 
        $userByCode = User::where('verification_code', $request->verification_code)->first();
        if(!$userByCode) {
            return response()->json([
                'message' => trans('auth.code')
            ], 401);
        }
        $user = User::where('email', $request->email)
                    ->where('verification_code', $request->verification_code)
                    ->first();
        $user->password = Hash::make($request->password);
        $user->verification_code = null;
        if($user->save()) {
            return response()->json([
                'message' => trans('auth.reset')
            ], 200);
        } 
        return response()->json([
            'message' => trans('auth.failed')
        ], 500);
    }
}
