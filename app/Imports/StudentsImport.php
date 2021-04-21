<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
class StudentsImport implements ToModel, WithHeadingRow
{

    public function headingRow() : int
    {
        return 1;
    }

    public function model(array $row)
    {
        $id_last=Student::all()->last();
        if($id_last != null){
        $code="PH00$id_last->id";
        }else{
            $code="PH001";
        }
        $date_of_birth=\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_birth']);
        return new Student(
            [
            'fullname' => $row['fullname'] ?? $row['fullname'],
            'status' =>1,
            'code' =>"$code",
            'password' =>bcrypt('123456'),
            'email' => $row['email'] ?? $row['email'],
            'address' => $row['address'] ?? $row['address'],
            'class_id' => $row['class_id'] ?? $row['class_id'],
            'phone' => $row['phone'] ?? $row['phone'],
            'date_of_birth' =>$date_of_birth,
            ]
            );
    }
}
