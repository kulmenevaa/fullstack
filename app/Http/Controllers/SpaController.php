<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class SpaController extends Controller
{
    public function index() {
        return view('index');
    }
}
