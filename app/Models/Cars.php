<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $primaryKey = 'id_car';
    protected $fillable = [
            'matricule_car',
            'id_car',
            'name_car',
            'desc_car',
            'id_category',
            'price_car',
            'is_available',
            'color_car',
            'model_car',
            'type_car',
            'img_car',
            'car_insurance',
            'exp_car_insurance',
            'technical_visit',
            'exp_technical_visit',
    ];
    protected $dates = ['car_insurance', 'exp_car_insurance', 'technical_visit', 'exp_technical_visit'];
}
