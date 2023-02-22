<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlan extends Model
{
    use HasFactory;
    protected $fillable = ['projects_id', 'name', 'image', 'bedrooms_id', 'bathrooms_id', 'size', 'sizes_id', 'brief_description', 'videos', 'unit_images', 'payment_plan', ];
}
