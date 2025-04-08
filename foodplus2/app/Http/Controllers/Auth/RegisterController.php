<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:penyedia,penerima',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'preferences' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Buat profil untuk user tersebut
        Profile::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'address' => $request->address,
            'preferences' => $request->preferences,
        ]);

        event(new Registered($user));
        Auth::login($user);

        // Redirect sesuai role
        if ($user->role == 'penyedia') {
            return redirect()->route('penyedia.dashboard');
        } else {
            return redirect()->route('penerima.dashboard');
        }
    }
}
