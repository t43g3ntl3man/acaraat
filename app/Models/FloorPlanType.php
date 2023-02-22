<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlanType extends Model
{
    use HasFactory;
    protected $fillable = ['floor_plans_id', 'property_types_id'];
}
