<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Orders extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'car_order_id';
    protected $fillable = [
        'id_car',
        'trans_number',
        'cin_user',
        'methode_py',
        'pu_location',
        'r_location',
        'date_debut',
        'date_fin',
        'prix_total',
        'created_at'
    ];
    protected $dates = ['date_debut', 'date_fin', 'created_at'];
}
