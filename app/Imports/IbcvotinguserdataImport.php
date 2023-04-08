<?php
namespace App\Imports;   
use App\Ibcvotinguserdata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Session;
    
class IbcvotinguserdataImport implements FromCollection,WithHeadingRow
{

    public function collection()
    {   
        return Ibcvotinguserdata::all();
    }
}