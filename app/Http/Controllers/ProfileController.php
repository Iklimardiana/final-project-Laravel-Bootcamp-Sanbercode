<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\User;
use Illuminate\support\Facades\Auth;


class ProfileController extends Controller
{
    public function index()
{
    $idUser = Auth::id();

    $detailProfile = profile::where('user_id', $idUser)->first();

    return view('profile.index', ['detailProfile' => $detailProfile]);
}

public function update(Request $request, $id)
{
        $request->validate([
            'bio' => 'required|string|max:255',
            'age' => 'required|numeric|min:1',
            'address' => 'required|string|max:255'
        ]);
    
        $profile = profile::find($id);
        if (!$profile) {
            return back()->with('error', 'Profile not found.');
        }
        $profile->age = $request->age;
        $profile->address = $request->address;
        $profile->bio = $request->bio;
        $profile->save();
    
        return redirect('/profile');
}
}
