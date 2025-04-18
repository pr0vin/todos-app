<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //


    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect('/')->with('success', 'Login successful');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout successful');
    }

    public function showRegistrationForm()
    {
        $user = new User();
        return view('auth.register', compact('user'));
    }

    public function storeRegisterData(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User registered successfully');
    }
    public function edit($id)
    {

        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
        return view('auth.register', compact('user'));
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/')->with('success', 'User deleted successfully');
    }
}
