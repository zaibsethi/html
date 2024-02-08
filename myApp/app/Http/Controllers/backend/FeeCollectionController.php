<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\FeeCollection;
use App\Models\Member;
use App\Models\MemberAttendance;
use App\Models\Package;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeeCollectionController extends Controller
{
    public function addFee()

    {
//      member and package get send from db for fee
//        $memberData = DB::table("members")->select('*')->cursor();
        $memberData = Member::where('belong_to_gym',Auth::user()->belong_to_gym)->get();
        $packageData = Package::where('belong_to_gym',Auth::user()->belong_to_gym)->get();
        $memberAttendance = MemberAttendance::where('belong_to_gym',Auth::user()->belong_to_gym)->get();
        return view('backend.fee-collection.add-feeCollection', compact('memberData', 'packageData', 'memberAttendance'));
    }

    public function createFee(Member $id, Request $request)
    {
        $feeData = $request->all();
//      add 30 days to fee_end_date
        $addDaysFee = Carbon::parse($request->member_fee_end_date)->addMonth(1)->format('Y-m-d');
        $id->update(['member_fee_end_date' => $addDaysFee]);;
        $feeData['belong_to_gym'] = Auth::user()->belong_to_gym;
        FeeCollection::create($feeData);
        return redirect(route('addFee'))->with('success', 'Fee collected successfully.');
    }

    public function feeHistory( Request $request)
    {

//get id from request and send specific member fee history
        $feeHistoryData = FeeCollection::where('member_id', $request->member_id)->get();

        return view('backend.fee-collection.fee-history-list', compact('feeHistoryData'));


    }
}
