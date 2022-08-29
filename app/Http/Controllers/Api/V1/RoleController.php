<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::orderBy('name', 'asc')->get();
        return [
            'roles' => RoleResource::collection($roles)
        ]; 
    }
}
