<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\ComponentImage;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      // Create 20 standalone components
      Component::factory()
         ->count(20)
         ->create()
         ->each(function (Component $component) {
            // add 1-5 images per component
            $imagesCount = rand(1, 5);
            ComponentImage::factory()->count($imagesCount)->create([
               'component_id' => $component->id,
            ]);
         });
   }
}
