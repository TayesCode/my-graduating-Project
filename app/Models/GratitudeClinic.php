<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GratitudeClinic extends Model
{
    use HasFactory;
    protected $fillable = [
        'g_clinicID',
        'name',
        'region',
        'zone',
        'woreda',
        'services',
        'fax',
        'postalCode',
        'email',
        'officeTelephone',
        'staffID',
        'accountID'

    ];
}
