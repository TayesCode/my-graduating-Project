<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterThreatedIndividual extends Model
{
    use HasFactory;
    protected $fillable = [
        'memberId',
        'firstName',
        'lastName',
        'phone',
        'gratitudeclinicID',
        'cardOfficerId'

    ];

}
