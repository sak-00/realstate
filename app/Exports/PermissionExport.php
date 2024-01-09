<?php

namespace App\Exports;

use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Concerns\FromCollection;

class PermissionExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Permission::all(); //return all table data

        //customize it
        //  return Permission::select('name','group_name')->get();
    }
}
