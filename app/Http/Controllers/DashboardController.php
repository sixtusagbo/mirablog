<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * Display add user profile image form
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('dashboard.profile');
    }

    /**
     * Update the user's profile_image field in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response    
     */
    public function uploadProfileImage(Request $request)
    {
        // return 123; //? test case

        $this->validate($request, [
            'profile_image' => 'image|required'
        ]);

        $id = auth()->user()->id; // user id whose image wil be added
        $user = User::find($id);

        if ($user->profile_image != 'no_profile_image.png') {
            Storage::delete('public/images/profile/' . $user->profile_image);
        }

        if ($request->hasFile('profile_image')) {
            // upload image to server and save name to database
            $fileNameWithExtension = $request->file('profile_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $fileExtension = $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtension;

            $request->file('profile_image')->storeAs('public/images/profile/', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_profile_image.png';
        }

        $user->profile_image = $fileNameToStore;
        $user->save();

        return redirect('/dashboard')->with('success', 'Profile image updated successfully!');
    }
}
