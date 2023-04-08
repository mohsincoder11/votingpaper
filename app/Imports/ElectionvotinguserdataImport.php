<?php
namespace App\Imports;   
use App\Electionvotinguserdata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Session;
    
class ElectionvotinguserdataImport implements FromCollection,WithHeadingRow
{
     public function collection()
    {   
        return Electionvotinguserdata::all();
    }
}