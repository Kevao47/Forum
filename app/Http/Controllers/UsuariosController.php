<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function insert(Request $request, Usuario $usuario)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:usuarios',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);
        $usuario->fill($request->all());
        $usuario->save();

        return redirect()->route('login')->withInput(['username' => $usuario->username]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'password' => 'confirmed',
        ]);

        $user = auth()->user();
        $user->fill($request->all());

        $user->save();
        return redirect()->back();
    }

    public function destroy()
    {
        auth()->user()->delete();
        return redirect()->route('home');
    }
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        // Tenta o login
        if (!Auth::attempt($credenciais)) {
            return redirect()->route('login')->withInput(['error' => 'Usuário ou senha inválidos.']);
        }

        session()->regenerate();
        return redirect()->route('home');
    }
    public function updateProfilePic(Request $request)
    {
        $request->validate([
            'photo_url' => 'required'
        ]);

        $url = $request->file('photo_url')->store('', 'imagens');
        auth()->user()->photo_url = $url;
        auth()->user()->save();
        return back();
    }
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    }
}
