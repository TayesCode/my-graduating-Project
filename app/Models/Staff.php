<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Staff extends Model
{      
    use Notifiable;

    use HasFactory;
    protected $primaryKey='employeeID';
    protected $fillable = [
        'employeeID',
        'adminID',
        'firstName',
        'middleName',
        'lastName',
        'dateOfBirth',
         'gender',
         'email',
         'region',
         'zone',
         'woreda',
         'kebele',
         'phone',
         'profession',
         'levelOfEducation',
         'userName',
         'password',
         'role',
         'photo',
         'schemeID'
    ];
}
