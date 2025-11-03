<?php

namespace App\Http\Controllers\Dashboard\Components;

use App\Models\Component;
use App\Models\ComponentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Service\FileUploadInterface;

class DashboardComponentsController extends Controller
{
   public $destinationPath = '';

   public function __construct(
      private FileUploadInterface $fileUploadInterface
   ) {
      $this->destinationPath = public_path('/files');
   }

   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $components = Component::query()->latest()->paginate(10);
      return view('dashboard.components.index', ['components' => $components]);
   }

   /**
    * Store a newly created component in storage.
    */
   public function store(Request $request)
   {
      $validated = $request->validate([
         'name' => 'required|string|max:255',
         'part_number' => 'nullable|string|max:255',
         'manufacturer' => 'nullable|string|max:255',
         'condition' => 'nullable|string|max:255',
         'price' => 'nullable|numeric|min:0',
         'description' => 'nullable|string',
         'images.*' => 'nullable|image|max:5120', // each image max 5MB
      ]);

      DB::beginTransaction();

      try {
         $componentData = collect($validated)->except(['images'])->toArray();

         $component = Component::create($componentData);

         if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
               if ($imageFile->isValid()) {
                  $fileName = $this->fileUploadInterface->uploadFiles($imageFile, $this->destinationPath);
                  ComponentImage::create([
                     'component_id' => $component->id,
                     'path' => $fileName,
                  ]);
               }
            }
         }

         DB::commit();

         return redirect()->back()->with('success', 'Component created successfully.');
      } catch (\Exception $e) {
         DB::rollBack();
         return back()->withErrors('Failed to create component. Please try again.')->withInput();
      }
   }

   /**
    * Display the specified component.
    */
   public function show(Component $component)
   {
      return view('dashboard.components.show', compact('component'));
   }

   /**
    * Show the form for editing the specified component.
    */
   public function edit(Component $component)
   {
      return view('dashboard.components.edit', compact('component'));
   }

   /**
    * Update the specified component in storage.
    */
   public function update(Request $request, Component $component)
   {
      $validated = $request->validate([
         'name' => 'required|string|max:255',
         'part_number' => 'nullable|string|max:255',
         'manufacturer' => 'nullable|string|max:255',
         'condition' => 'nullable|string|max:255',
         'price' => 'nullable|numeric|min:0',
         'description' => 'nullable|string',
         'images.*' => 'nullable|image|max:5120',
      ]);

      DB::beginTransaction();

      try {
         $componentData = collect($validated)->except(['images'])->toArray();

         $component->update($componentData);

         // handle newly uploaded images (append)
         if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
               if ($imageFile->isValid()) {
                  $fileName = $this->fileUploadInterface->uploadFiles($imageFile, $this->destinationPath);
                  ComponentImage::create([
                     'component_id' => $component->id,
                     'path' => $fileName,
                  ]);
               }
            }
         }

         DB::commit();

         return redirect()->back()->with('success', 'Component updated successfully.');
      } catch (\Exception $e) {
         DB::rollBack();
         return back()->withErrors('Failed to update component. Please try again.')->withInput();
      }
   }

   /**
    * Remove the specified component from storage.
    */
   public function destroy(Component $component)
   {
      DB::beginTransaction();

      try {
         // delete image files
         foreach ($component->images as $image) {
            if ($image->path && file_exists($this->destinationPath . '/' . $image->path)) {
               @unlink($this->destinationPath . '/' . $image->path);
            }
         }

         $component->delete();

         DB::commit();

         return redirect()->back()->with('success', 'Component deleted successfully.');
      } catch (\Exception $e) {
         DB::rollBack();
         return back()->withErrors('Failed to delete component. Please try again.');
      }
   }
}
