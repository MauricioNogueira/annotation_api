<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistraRequest;

class AuthenticationController extends Controller
{
    public function registrar(RegistraRequest $request)
    {
        DB::beginTransaction();

        try {
            $usuario = Usuario::create([
                'nome' => $request->nome,
                'login' => $request->login,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $usuario->token = Hash::make(rand(1, 1000000));
            $usuario->save();

            DB::commit();
            $response = app()->make('Response')->success('Usuário cadastrado com sucesso');
        } catch (\Throwable $th) {
            DB::rollback();
            $response = app()->make('Response')->error($th->getMessage());
        }

        return $response;
    }

    public function efetuarLogin(LoginRequest $request)
    {
        dd($request->header());
    }
}
