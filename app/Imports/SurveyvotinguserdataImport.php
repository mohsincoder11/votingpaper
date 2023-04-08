<?php
namespace App\Imports;   
use App\Survey_userdata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Session;
    
class SurveyvotinguserdataImport implements FromCollection,WithHeadingRow
{
     public function collection()
    {   
        return Survey_userdata::all();
    }
}