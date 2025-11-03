<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
   use HasFactory;

   protected $fillable = [
      'name',
      'part_number',
      'description',
      'manufacturer',
      'condition',
      'price',
   ];


   /**
    * Get image URL accessor
    */
   public function getImageUrlAttribute()
   {
      // For backwards compatibility, return first image if any
      $first = $this->images()->first();
      return $first ? asset('storage/' . $first->path) : null;
   }

   /**
    * Component has many images
    */
   public function images()
   {
      return $this->hasMany(ComponentImage::class);
   }
}