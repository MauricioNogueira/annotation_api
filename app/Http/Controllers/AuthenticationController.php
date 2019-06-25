<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthenticationController extends Controller
{
    public function efetuarLogin(LoginRequest $request)
    {
        dd($request->header());
    }
}
