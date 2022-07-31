<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class Appointment extends Model
{
    use HasFactory;
    use Notifiable;

    protected $primaryKey = 'appointment_id';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
