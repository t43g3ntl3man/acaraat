<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = ['floor_plans_id', 'unit_number', 'unit_statuses_id', 'floor', 'price', 'features', 'extra_feature_description'];
}
