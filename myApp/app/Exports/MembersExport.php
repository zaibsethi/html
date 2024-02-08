<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class MembersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

//        yeh column nhi export hon ge
        return Member::all()->makeHidden(['image','member_phone', 'member_joining_date', 'member_address', 'member_pemc', 'created_at', 'updated_at']);
//         $users->except(['id']);
//        return $users;


    }

    public function headings(): array
    {
//        export file heading
        return [
            'Id',
            'Name',
            'Gender',
            'Blood Group',
            'Fee Date',
            'member_phone',
        ];
    }
}


