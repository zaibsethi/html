<?php
//
//namespace App\Http\Controllers\backend;
//
//use App\Http\Controllers\Controller;
//use App\Models\Member;
//use App\Models\MemberThing;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class MemberThingController extends Controller
//{
//    public function addMemberThing()
//    {
//        return view('backend.member-things.add-thing');
//    }
//
//    public function createThing(Request $request)
//    {
//        $getData = $request->all();
//        //get all members data
//        $getMemberData = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
//        //get all members table first row
//
//        $checkEmpty = Member::first();
//        if (is_null($checkEmpty)) {
//            // Table is  empty.
//
//            return redirect()->route('addMemberThing')->with('danger', 'Members table is empty.');
//
//        } else {
//            // Table is not empty.
//            foreach ($getMemberData as $getMemberDataVar) {
//                if ($getMemberDataVar->member_phone == $request->member_phone) {
//                    $getData['member_name'] = $getMemberDataVar->member_name;
//                    $getData['member_fee_end_Date'] = $getMemberDataVar->member_fee_end_date;
//
//                    // For Comparing already existing data
//                    $getAllMemberThings = MemberThing::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
//                    foreach ($getAllMemberThings as $getAllMemberThingsVar) {
//                        if ($getAllMemberThingsVar->member_phone == $request->member_phone && $getAllMemberThingsVar->member_thing_category == $request->member_thing_category) {
//
//                            return redirect()->route('addMemberThing')->with('danger', 'Already in list.');
//
//                        }
//
//                    }
//                    $getData['belong_to_gym'] = Auth::user()->belong_to_gym;
//
//                    MemberThing::create($getData);
//                    return redirect()->route('addMemberThing')->with('success', 'Thing added successfully.');
//                } else {
//                    return redirect()->route('addMemberThing')->with('danger', 'Member not found.');
//
//                }
//
//            }
//
//        }
//
//
//    }
//
//    public function thingsList()
//    {
//        $thingsData = MemberThing::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
//        return view('backend.member-things.things-list', compact('thingsData'));
//
//    }
//
//    public function deleteThing($id)
//    {
//        MemberThing::where('id', $id)->delete();
//
//        return redirect()->route('thingsList')->with('success', 'Deleted Successfully.');
//
//
//    }
//}
