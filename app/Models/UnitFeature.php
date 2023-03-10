<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitFeature extends Model
{
    protected $fillable = ['name', 'developers_id'];
    use HasFactory;
}
