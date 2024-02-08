<?php
////
////namespace App\Imports;
////
////use App\Models\Member;
////use Illuminate\Support\Collection;
////use Illuminate\Support\Facades\Hash;
////use Maatwebsite\Excel\Concerns\ToCollection;
////
////class MembersImport implements ToCollection
////{
////    /**
////     * @param Collection $collection
////     */
////    public function collection(Collection $collection)
////    {
////        return new Member([
////            'id' => $collection[0],
////
////        ]);
////    }
////
////
////}
//
//
//namespace App\Imports;
//
//use Carbon\Carbon;
//
//use App\Models\Member;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
//use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;
//
//class MembersImport implements ToModel, WithHeadingRow
//{
//    public function model(array $row)
//    {
//        return new Member([
//            "roll_no" => $row['roll_no'],
//            "belong_to_gym" => $row['belong_to_gym'],
//            "member_name" => $row['member_name'],
//            'member_phone' => $row['member_phone'] ?? null,
//            'updated_at' => now(),
//            'created_at' => now(),
//        ]);
//    }
//
//
//}
