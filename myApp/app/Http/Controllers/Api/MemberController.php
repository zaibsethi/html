<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{


    public function login(Request $request)
    {
////        dd('working');
//        $data = $request->validate([
//
//        ]);

        $validator = Validator::make($request->all(),[
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return  response()->json($validator->errors(),400);
        }


        if (auth()->attempt($validator->validated())) {
            return response(['error_message' => 'Incorrect Details.
            Please try again']);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

//        return response(['user' => auth()->user(), 'token' => $token]);
        return response(['token' => $token]);

    }
//    public function login()
//    {
//        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
//            $user = Auth::user();
//            $success['token'] = $user->createToken('gym_cms')->accessToken;
//            return response()->json(['success' => $success], 202);
//        } else {
//            return response()->json(['error' => 'Unauthorised'], 401);
//        }
//
//    }

    public function membersList()
    {


//        $user = Auth::user();
//        return response()->json(['success' => $user], 202);
//        $token = Auth::user()->token();
//        return $token;
//        //current date
//        $cDate = now();
//        //compare to current month
//        $allMembersData = Member::whereYear('all_members_list_api_date', $cDate->year)->whereMonth('all_members_list_api_date', '!=', $cDate->month)->get();
//        foreach ($allMembersData as $allMembersDataVar) {
//            $allMembersDataVar->api_type = 'all_member';
//        }
//        return ['status' => true, 'message' => "List of all Members.", 'data' => ["members" => MemberResource::collection($allMembersData)]];


    }

    public function defaulterMembersFeeList()
    {
        //current date for comparing year and month
        $cDate = now();
        //current date with format for comparing fee date
        $cDate1 = now()->format('Y-m-d');

        $defaultMember = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->whereYear('member_fee_end_date', $cDate->year)->whereMonth('member_fee_end_date', $cDate->month)->whereYear('default_members_list_api_date', $cDate->year)->whereMonth('default_members_list_api_date', '!=', $cDate->month)->where('member_fee_end_date', '<=', $cDate1)->get();
        foreach ($defaultMember as $defaultMemberVar) {
            $defaultMemberVar->api_type = 'defaulter_member';
        }
        return ['status' => true, 'message' => "List of Members  pending fee.", 'data' => ["members" => MemberResource::collection($defaultMember)]];


    }

    public function activeMembersList()
    {
        $cDate = now();
        $cDate1 = now()->addDay(-15);
        $activeMember = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->whereYear('active_members_list_api_date', $cDate->year)->whereMonth('active_members_list_api_date', '!=', $cDate->month)->where('member_fee_end_date', '>', $cDate1)->get();
        foreach ($activeMember as $activeMemberVar) {
            $activeMemberVar->api_type = 'active_member';
        }
        return ['status' => true, 'message' => "List of active Members.", 'data' => ["members" => MemberResource::collection($activeMember)]];


//        $fee = Http::get('https://newwebgym.000webhostapp.com/api/active-members-list');
//        dd($fee->body());
//        return ['status' => true, 'message' => "List of Members  pending fee.", 'data' => ["members" => MemberResource::collection($fee)]];
//

    }

    public function newMembersList()
    {
        $cDate = now();
        $newMember = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->whereYear('new_members_list_api_date', $cDate->year)->whereMonth('new_members_list_api_date', $cDate->month)->whereYear('created_at', $cDate->year)->whereMonth('created_at', $cDate->month)->whereDay('created_at', $cDate->day)->get();
        foreach ($newMember as $newMemberVar) {
            $newMemberVar->api_type = 'new_member';
        }
        return ['status' => true, 'message' => "List of Members  new members.", 'data' => ["members" => MemberResource::collection($newMember)]];

    }

    public function dailyMembersFeeList()
    {

        $cDate = now()->format('Y-m-d');
        $dailyFee = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->where('daily_members_fee_list_api_date', '!=', $cDate)->where('member_fee_end_date', $cDate)->get();
        foreach ($dailyFee as $membersDataVar) {
            $membersDataVar->api_type = 'daily_fee';
        }
        return ['status' => true, 'message' => "List of Members daily  pending fee.", 'data' => ["members" => MemberResource::collection($dailyFee)]];

    }

    public function nightShiftMembersList()
    {
        $cDate = now()->addDay(-20);
        $nightShift = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->where('night_shift_members_list_api_date', '!=', $cDate)->where('member_fee_end_date', '>', $cDate)->where('member_shift', 'night')->get();
        foreach ($nightShift as $nightShiftVar) {
            $nightShiftVar->api_type = 'night_shift';
        }
        return ['status' => true, 'message' => "List of active Members.", 'data' => ["members" => MemberResource::collection($nightShift)]];

    }

    public function eveningShiftMembersList()
    {
        $cDate = now()->addDay(-15);
        $eveningShift = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->where('evening_shift_members_list_api_date', '!=', $cDate)->where('member_fee_end_date', '>', $cDate)->where('member_shift', 'evening')->get();
        foreach ($eveningShift as $eveningShiftVar) {
            $eveningShiftVar->api_type = 'evening_shift';
        }
        return ['status' => true, 'message' => "List of active Members.", 'data' => ["members" => MemberResource::collection($eveningShift)]];

    }

    public function morningShiftMembersList()
    {
        $cDate = now()->addDay(-15);
        $morningShift = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->where('morning_shift_members_list_api_date', '!=', $cDate)->where('member_fee_end_date', '>', $cDate)->where('member_shift', 'morning')->get();
        foreach ($morningShift as $morningShiftVar) {
            $morningShiftVar->api_type = 'morning_shift';
        }
        return ['status' => true, 'message' => "List of active Members.", 'data' => ["members" => MemberResource::collection($morningShift)]];

    }


    public function storeStatusAndDate(Request $request)
    {
        $getData = $request->all();
        dd($getData);
        $cDate = now()->addMonth(1)->format('Y-m-d');
        if ($request->api_type == "all_member") {

            Member::where('belong_to_gym', Auth::user()->belong_to_gym)->where('id', $request->id)->update([
                'all_members_list_api_date' => $cDate
            ]);
        }


    }
}
