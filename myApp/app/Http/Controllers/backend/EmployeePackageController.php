<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeePackage;
use App\Http\Requests\CreatePackageRequest;
use App\Models\EmployeePackage;
use Illuminate\Support\Facades\Auth;

class EmployeePackageController extends Controller
{
    public function addEmployeePackage()
    {
        return view('backend.employee-package.add-employee-package');
    }

    public function createEmployeePackage(CreateEmployeePackage $request)
    {

        $getEmployeeData = EmployeePackage::where('belong_to_gym', Auth::user()->belong_to_gym)->where('salary_package_id', '<>', null)->count();

        $getPackageRequestData = $request->all();
        $getPackageRequestData['belong_to_gym'] = Auth::user()->belong_to_gym;
        $getPackageRequestData['salary_package_id'] = $getEmployeeData + 1;
        EmployeePackage::create($getPackageRequestData);
        return redirect(route('addEmployeePackage'))->with('success', 'Package created successfully.');
    }

    public function employeePackagesList()
    {
        $packageData = EmployeePackage::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
        return view('backend.employee-package.employee-packages-list', compact('packageData'));
    }

    public function editEmployeePackage($id)
    {
        $editPackageData = EmployeePackage::where('belong_to_gym', Auth::user()->belong_to_gym)->where('salary_package_id', $id)->first();

//        $editPackageData = EmployeePackage::find($id);
        return view('backend.employee-package.edit-employee-package', compact('editPackageData'));
    }

    public function updateEmployeePackage(CreatePackageRequest $request, $id)
    {
        $getSalaryData = EmployeePackage::where('belong_to_gym', Auth::user()->belong_to_gym)->where('salary_package_id', $id)->first();

        $getPackageRequestData = $request->all();
        $getSalaryData->update($getPackageRequestData);
        return redirect(route('employeePackagesList'))->with('success', 'Package updated successfully.');
    }
}
