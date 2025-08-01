<?php

namespace App\Http\Controllers\Dashboard\Equipments;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Service\FileUploadInterface;

class DashboardEquipmentsController extends Controller
{
    /**
     * destinationPath
     *
     * @var string
     */
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
        $equipments = Equipment::query()->latest()->paginate(10);
        return view('dashboard.equipments.index', ['equipments' => $equipments]);
    }

    /**
     * Store a newly created equipment in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'condition'   => 'required|in:new,used,refurbished',
            'year'        => 'nullable|integer|min:1900|max:' . date('Y'),
            'price'       => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:3072', // max 3MB
        ]);

        DB::beginTransaction();

        try {

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $validated['image'] = $this->fileUploadInterface->uploadFiles($request->file('image'), $this->destinationPath);
            } else {
                $validated['image'] = 'defualt.png';
            }

            Equipment::create($validated);

            DB::commit();

            return redirect()->back()
                ->with('success', 'Equipment created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors('Failed to create equipment. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified equipment.
     */
    public function show(Equipment $equipment)
    {
        return view('dashboard.equipments.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified equipment.
     */
    public function edit(Equipment $equipment)
    {
        return view('dashboard.equipments.edit', compact('equipment'));
    }

    /**
     * Update the specified equipment in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'condition'   => 'required|in:new,used,refurbished',
            'year'        => 'nullable|integer|min:1900|max:' . date('Y'),
            'price'       => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:3072',
        ]);

        DB::beginTransaction();

        try {
            $oldimageName = $equipment->image ?? '';

            $imageFile = $request->has('image') ? $validated['image'] : '';

            if ($imageFile && $imageFile->isValid()) {
                $validated['image'] = $this->fileUploadInterface->uploadFiles($imageFile, $this->destinationPath);
                if (file_exists($this->destinationPath . '/' . $oldimageName)) {
                    unlink($this->destinationPath . '/' . $oldimageName);
                }
            } else {
                $validated['image'] = $oldimageName;
            }

            $equipment->update($validated);

            DB::commit();

            return redirect()->back()
                ->with('success', 'Equipment updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors('Failed to update equipment. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified equipment from storage.
     */
    public function destroy(Equipment $equipment)
    {
        DB::beginTransaction();

        try {
            
            if ($equipment->image) {
                if (file_exists($this->destinationPath . '/' . $equipment->image)) {
                    unlink($this->destinationPath . '/' . $equipment->image);
                }
            }

            $equipment->delete();

            DB::commit();

            return redirect()->back()
                ->with('success', 'Equipment deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Failed to delete equipment. Please try again.');
        }
    }
}
