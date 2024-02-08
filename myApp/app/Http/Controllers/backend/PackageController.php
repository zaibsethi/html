<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePackageRequest;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function addPackage()
    {

        return view('backend.package.add-package');


    }

    public function createPackage(CreatePackageRequest $request)
    {
        $getPackageData = Package::where('belong_to_gym', Auth::user()->belong_to_gym)->count();
        $getPackageRequestData = $request->all();
        $getPackageRequestData['belong_to_gym'] = Auth::user()->belong_to_gym;
        $getPackageRequestData['package_id'] = $getPackageData + 1;
        Package::create($getPackageRequestData);
        return redirect(route('addPackage'))->with('success', 'Package created successfully.');
    }

    public function packagesList()
    {
        $packageData = Package::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
        return view('backend.package.packages-list', compact('packageData'));

    }

    public function editPackage($id)
    {
        $editPackageData = Package::where('belong_to_gym', Auth::user()->belong_to_gym)->where('package_id',$id)->first();
        return view('backend.package.edit-package', compact('editPackageData'));
    }

    public function updatePackage(CreatePackageRequest $request,  $id)
    {
        $getPackageData = Package::where('belong_to_gym', Auth::user()->belong_to_gym)->where('package_id',$id)->first();

        $getPackageRequestData = $request->all();
        $getPackageData->update($getPackageRequestData);

        return redirect(route('packagesList'))->with('success', 'Package updated successfully.');
    }
}
