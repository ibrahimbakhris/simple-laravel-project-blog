<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::where('id', Auth::id())->firstOrFail();

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = User::where('id', Auth::id())->firstOrFail();
        //dd($request->all());
        // Input Validation.
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|email|string|max:255|unique:users,email,' . $user->id,
        ]);

        if(!empty($validatedData['password'])){
            $validatedData['password'] = bcrypt($validatedData['password']);
        }


        $user->update($validatedData);

        return redirect()->route('profile.edit')
            ->with('success', 'Profile updated successfully!');
    }
}
