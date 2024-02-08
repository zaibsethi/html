<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function addGym()
    {
        $getGymData = DB::table('users')->latest('gym_id')->first();
        $id = $getGymData->gym_id;
        return view('backend.gym-profile.add-gym', compact('id'));
    }

    public function createGym(Request $request)
    {

        $getData = $request->all();
        // Remove free space
        $getData['gym_name'] = str_replace(' ', '', $request->gym_name);
        // $getData['gym_name'] = trim($request->gym_name);
        $getData['gym_title'] = str_replace(' ', '', $request->gym_name);
        // Add slug
        $getData['gym_slug'] = str_slug($request->gym_name);
        //split name into array and use first name
        $firstName = explode(' ', $getData['name'], 2)[0];
        $getData['email'] = strtolower($firstName . "@" . $getData['gym_name'] . ".com");
        $filename = '';
        if ($request->hasFile('gym_logo')) {
            $image = $request->file('gym_logo');
            $path = public_path() . '/backend/images/gym/profile/';
            $filename = time() . $image->getClientOriginalName();
            $image->move($path, $filename);
            $request->gym_logo = $filename;
        }

        $getData['password'] = Hash::make($request->password);
        $getData['belong_to_gym'] = $request->gym_id;

        $userData = User::create($getData);
        if ($request->gym_logo != null) {
            $userData->gym_logo = $filename;
            $userData->save();
        }

        return redirect(route('addGym'))->with("success", 'Gym created successfully.');


    }

    public
    function gymList()
    {
        $gymData = User::where('gym_id', '!=', null)->get();
        return view('backend.gym-profile.gym-list', compact('gymData'));

    }

    public function editGym($id)
    {
        $userData = User::where('gym_id', $id)->first();

        return view('backend.gym-profile.edit-gym', compact('userData'));

    }

    public function updateGym(Request $request, User $id)
    {
        $getData = $request->all();
        // Remove free space
        $getData['gym_name'] = str_replace(' ', '', $request->gym_name);
        // $getData['gym_name'] = trim($request->gym_name);
        $getData['gym_title'] = str_replace(' ', '', $request->gym_name);
        // Add slug
        $getData['gym_slug'] = str_slug($request->gym_name);
        //split name into array and use first name
        $firstName = explode(' ', $getData['name'], 2)[0];
        $getData['email'] = strtolower($firstName . "@" . $getData['gym_name'] . ".com");
        $filename = '';
        if ($request->hasFile('gym_logo')) {
            $image = $request->file('gym_logo');
            $path = public_path() . '/backend/images/gym/profile/';
            $filename = time() . $image->getClientOriginalName();
            $image->move($path, $filename);
            $request->gym_logo = $filename;
        }

        $getData['password'] = Hash::make($request->password);
        $getData['belong_to_gym'] = $request->gym_id;

//        if ($request->gym_logo != null) {
//            $getData->gym_logo = $filename;
//            $getData->save();
//        }


        $id->update($getData);
        if ($request->gym_logo != null) {
            $id->gym_logo = $filename;
            $id->save();
        }

        return redirect(route('gymList'))->with("success", 'Gym updated successfully.');
    }

    public
    function addUser()
    {
        $countUserData = User::where('belong_to_gym', Auth::user()->gym_id)->count();
        return view('backend.user-profile.add-user', compact('countUserData'));

    }

    public
    function createUser(Request $request)
    {
        $userData = $request->all();
        //split name into array and use first name
        $firstName = explode(' ', $userData['name'], 2)[0];
        //lower letter the  mail
        $userData['email'] = strtolower($firstName . "@" . Auth::user()->gym_name . ".com");
        $userData['belong_to_gym'] = Auth::user()->gym_id;
        $userData['password'] = Hash::make($request->password);
        $existingUser = User::where('email', $userData['email'])->first();
        if ($existingUser) {
            return redirect(route('addUser'))->with('danger', "Duplicate email please select unique name.");
        }
        User::create($userData);
        return redirect(route('addUser'))->with('success', "user Created.");
    }

    public function userList()
    {
        // Get users with the same gym_id or belong_to_gym as the authenticated user's gym_id
        $usersData = User::where('gym_id', Auth::user()->gym_id)
            ->orWhere('belong_to_gym', Auth::user()->gym_id)
            ->get();

        return view('backend.user-profile.users-list', compact('usersData'));
    }


    public
    function editUser($id)
    {

        $userData = User::find($id);

        return view('backend.user-profile.edit-user-profile', compact('userData'));

    }

    public function updateUser(Request $request, User $id)
    {
        $userData = $request->all();
        // Hash the password
        $userData['password'] = Hash::make($request->password);
        //split name into array and use first name
        $firstName = explode(' ', $request->name, 2)[0];
        //lower letter the  mail
        $userData['email'] = strtolower($firstName . "@" . Auth::user()->gym_name . ".com");
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . '/backend/images/user/profile/';
            $filename = time() . $image->getClientOriginalName();
            $image->move($path, $filename);
            $request->image = $filename;


            // Unlink old image if it exists
            if ($id->image) {
                $oldImagePath = public_path() . '/backend/images/user/profile/' . $id->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $userData['image'] = $filename;
        }

        // Set 'belong_to_gym' based on user type
        $userData['belong_to_gym'] = Auth::user()->gym_id;


        // Update the user
        $id->update($userData);
        if ($request->image != null) {
            $id->image = $filename;
            $id->save();
        }
        // Redirect with success message
        return redirect()->route('userList')->with('success', 'User info Updated.');
    }


}

