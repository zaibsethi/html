<?php
//
//namespace App\Http\Controllers\Api;
//
//use App\Http\Controllers\Controller;
//use App\Http\Requests\CreatePackageRequest;
//use App\Http\Resources\PackageResource;
//use App\Models\Package;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class PackageController extends Controller
//{
//
//
//    public function packagesList()
//    {
//
//        $packageData = Package::where('belong_to_gym', Auth::user()->belong_to_gym)->get();
//        //single
////        return new PackageResource()
//        //collection or array or multiple
//        return ['status' => true, 'message' => "List of all packages.", "data" => ["packages" => PackageResource::collection($packageData)]];;
//
//    }
//
//
//}
