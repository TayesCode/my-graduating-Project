<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAcount extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'firstName',
        'lastName',
         'email',
         'phone',
         'userName',
         'password',
         'schemeID'
    ];
}
