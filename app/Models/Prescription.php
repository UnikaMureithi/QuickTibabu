<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class Prescription extends Model
{
    use HasFactory;


    protected $fillable = [
        'diagnosis',
        'medication_name',
        'dose',
        'dates_prescribed',
        'patient_id',
        'doctro_id',

    ];
}
