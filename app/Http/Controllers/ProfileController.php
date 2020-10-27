<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function edit(User $user)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('auth.profile', compact('user'));
    }

    public function update(Request $request, User $user) {
        $id = Auth::id();
        $user = User::findOrFail($id);

        $user = User::where('id', $id)->update([
            'name'     => $request->name,
            'email'   => $request->email,
            'username'   => $request->username,
            'updated_at' => now()
        ]);

        return redirect()->route('home')->with(['success' => 'Your profile was updated!']);
    } 
}
