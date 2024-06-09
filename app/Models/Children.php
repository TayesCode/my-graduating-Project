<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    protected $table='childrens';

    protected $fillable = [
         'memberID',
         'firstName',
         'middleName',
         'lastName',
          'dateOfBirth',
          'gender',
          'status',
          'photo',
          'employeeID',
    ];
}
