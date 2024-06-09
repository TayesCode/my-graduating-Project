<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateRequest extends Model
{
    use HasFactory;
    protected $fillable=[
     'memberID',
     'subject',
     'description',
     'date' 

    ];
}
