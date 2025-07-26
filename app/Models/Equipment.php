<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentFactory> */
    use HasFactory;

        protected $fillable = [
        'name',
        'description',
        'category',
        'condition',
        'year',
        'price',
        'image'
    ];

    /**
     * Get the image URL (accessor)
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/'.$this->image);
    }

}
