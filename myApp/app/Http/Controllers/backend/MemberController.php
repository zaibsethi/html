<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\CreateMemberRequest;
use App\Http\Requests\Member\UpdateMemberRequest;
use App\Models\Employee;
use App\Models\Member;
use App\Models\Member1;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MembersExport;
use App\Imports\MembersImport;

class MemberController extends Controller
{
    public function addMember()
    {
        // id send for rollnumber autoincrement
        // latest get from created_at
        // jahan same gym k members hon ge total count k liye
        $id = DB::table('members')->where('belong_to_gym', Auth::user()->belong_to_gym)->where('roll_no', '<>', null)->count();
//        $id = DB::table('members')->select('roll_no')->where('belong_to_gym', Auth::user()->belong_to_gym)->orderBy('id', 'desc')->value('roll_no');
        //all packages belong to same gym
        $getPackageData = Package::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
        return view('backend.member.add-member', compact('id', 'getPackageData',));
    }

    public function createMember(CreateMemberRequest $request)
    {
        $id = DB::table('members')->where('belong_to_gym', Auth::user()->belong_to_gym)->where('roll_no', '<>', null)->count();

        $getMemberData = $request->all();
        $getMemberData['member_joining_date'] = Carbon::createFromFormat('m/d/Y', $request->member_joining_date)->format('Y-m-d');
        $getMemberData['member_fee_start_date'] = Carbon::createFromFormat('m/d/Y', $request->member_fee_start_date)->format('Y-m-d');
        $getMemberData['member_fee_end_date'] = Carbon::createFromFormat('m/d/Y', $request->member_fee_end_date)->format('Y-m-d');
        $getMemberData['belong_to_gym'] = Auth::user()->belong_to_gym;
        $getMemberData['roll_no'] = $id + 1;
        Member::create($getMemberData);

        return redirect(route('addMember'))->with('success', 'Member created successfully.');
    }

    public function memberList()
    {
        $memberData = Member::where('belong_to_gym', Auth::user()->belong_to_gym)
            ->orderBy('roll_no')
            ->get();        // checking for cache if members data exist or not, if not then create
//        if (Cache::missing('members')) {
//            Cache::put('members', Member::select(['id', 'member_name', 'member_phone', 'member_fee_end_date'])->get(), now()->addSecond(20));
//            $memberData = Cache::get('members');
//        } else {
//            $memberData = Cache::get('members');
//        }
        return view('backend.member.member-list', compact('memberData'));
    }

    public function editMember($id)
    {
        $gymId = Auth::user()->belong_to_gym;
        $getPackageData = Package::where('belong_to_gym', $gymId)->get();
        $memberDataByID = Member::where('belong_to_gym', $gymId)->where('roll_no', $id)->first();
        $getEmployeeData = Employee::where('belong_to_gym', $gymId)->where('employee_type', 'trainer')->get();
        return view('backend.member.edit-member', compact('memberDataByID', 'getPackageData', 'getEmployeeData'));
    }

    function updateMember(UpdateMemberRequest $request, $roll_no)
    {
//        $id = DB::table('members')->where('belong_to_gym', Auth::user()->belong_to_gym)->where('roll_no', '<>', null)->count();
//        $getMemberData['roll_no'] = $id + 1;

        $getMemberData = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->where('roll_no', $roll_no)->first();


        $this->validate($request, [
            'member_phone' => ($getMemberData->member_phone == $request->member_phone) ? 'required' : 'required|unique:members',
        ]);
        $memberData = $request->all();
        $getMemberData->update($memberData);

        // update member image
//        if ($request->image != '') {
//            $filename = '';
//            if ($request->hasFile('image')) {
//                $image = $request->file('image');
//                $path = public_path() . '/backend/images/member/profile/';
//                $filename = time() . $image->getClientOriginalName();
//                $image->move($path, $filename);
//                $request->image = $filename;
//                $image_path = "/backend/images/member/profile/";  // Value is not URL but directory file path
////               start: unlink old image
//                if ($getMemberData->image != null) {
//                    $oldImage = '/backend/images/member/profile/' . $getMemberData->image;
//                    $oldImagePath = str_replace('\\', '/', public_path());
//                    unlink($oldImagePath . $oldImage);
//                }
////               end: unlink old image
//            }
//            $getMemberData->update($memberData);
//            $getMemberData->image = $filename;
//            $getMemberData->save();
//        }
//        if ($request->image == '' || $request->image == null) {
//            $getMemberData->update($memberData);
//        }
        return redirect()->back()->with('success', 'Member info Updated.');
    }

//    public function memberExport()
//    {
//        // export members excel file from database
//        // refference: https://docs.laravel-excel.com/3.1/exports/
//        return Excel::download(new MembersExport, "members.xlsx", "Xlsx");
//    }

//    public function memberImport(Request $request)
//    {
////        https://docs.laravel-excel.com/3.1/imports/
////        https://dev.to/techtoolindia/import-excel-file-into-laravel-8-3kif
//        Excel::import(new MembersImport, $request->file);
//        return redirect(route('memberList'))->with('success', 'All good!');
//    }

    public function updateMemberDate(Request $request)
    {
        // from search can update old member
        $cdate = Carbon::parse(now()->format('Y-m-d'))->addMonths(-2);
        $cdate1 = now()->format('Y-m-d');
        $checkStatus = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->where('member_phone', $request->member_phone)->where('member_fee_end_Date', '<', $cdate)->update(['member_fee_end_Date' => $cdate1]);
        $memberFind = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
        if ($request->member_phone == null) {
            return redirect()->route('addAttendance')->with('danger', 'Enter mobile number.');
        }
        foreach ($memberFind as $memberFindVar) {
            //if request phone is equal to member number it will store in old member table
            if ($memberFindVar->member_phone == $request->member_phone) {
                if ($checkStatus != null) {
                    return redirect()->route('addAttendance')->with('success', 'Member  added in attendance list.');
                } elseif ($checkStatus == null) {
                    return redirect()->route('addAttendance')->with('success', 'Member date already  added in attendance list.');
                }
            }
        }
        return redirect()->route('addAttendance')->with('danger', 'Member not found.');
    }

    public function personalTraining()
    {
        $personalTraining = Member::where('belong_to_gym', Auth::user()->belong_to_gym)->where('trainer', Auth::user()->name)->get();
        $packageData = Package::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
        return view('backend.member.personal-training', compact('personalTraining', 'packageData'));
    }


}
