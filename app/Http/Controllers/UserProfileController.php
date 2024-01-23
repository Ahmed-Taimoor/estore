<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            redirect('/login');
        }
        $fUser = User::find($user->id);
        if (!$fUser->orders()) {
            return view("user_pages.user-profile", [
                'user' => $user,
            ]);
        }
        $orderPlaced = $fUser->orders()->get();

        return view("user_pages.user-profile", [
            'user' => $user,
            'orders' => $orderPlaced,
        ]);


    }
    public function addUserInfo($id, ProfileRequest $request)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404, 'User not found');
        }


        $userProfile = new UserProfile();
        $userProfile->first_name = $request->first_name;
        $userProfile->last_name = $request->last_name;
        $userProfile->phone_number = $request->phone_number;
        $userProfile->street_address = $request->street_address;
        $userProfile->city = $request->city;
        $userProfile->country = $request->country;

        $user->userProfile()->save($userProfile);

        return redirect('/profile');


    }


}