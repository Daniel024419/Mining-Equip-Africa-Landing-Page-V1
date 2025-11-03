<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentImage extends Model
{
   use HasFactory;

   protected $fillable = [
      'component_id',
      'path',
      'caption',
   ];

   public function component()
   {
      return $this->belongsTo(Component::class);
   }
}
