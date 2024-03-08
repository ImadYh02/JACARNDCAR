<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $table = 'user_data';
    protected $primaryKey = 'id_duser';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'cin'
    ];
}
