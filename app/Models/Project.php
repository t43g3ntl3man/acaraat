<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $casts = [
        'deed' => 'array',
        'escrow' => 'array',
        'location' => 'array',
        'images' => 'array',
        'videos' => 'array',
        'brouchers' => 'array',
        'payment_plans' => 'array',
    ];

    protected $fillable = ['name', 'developers_id', 'statuses_id', 'modes_id', 'completion_date', 'permit_number', 'deed', 'escrow', 'cities_id', 'location', 'brief_desctiption', 'no_of_units', 'no_of_floors', 'images', 'videos', 'cover', 'brouchers', 'minimum_price', 'maximum_price', 'payment_plans', 'main_features',
    'business_com', 'community_feat', 'healthcare'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'statuses_id');
    }
}