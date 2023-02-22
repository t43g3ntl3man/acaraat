<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlanAmenity extends Model
{
    use HasFactory;
    protected $fillable = ['floor_plans_id', 'amenities_id'];
}
