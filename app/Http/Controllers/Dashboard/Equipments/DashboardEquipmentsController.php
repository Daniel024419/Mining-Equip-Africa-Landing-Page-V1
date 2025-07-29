<?php

namespace App\Http\Controllers\Dashboard\Equipments;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardEquipmentsController extends Controller
{
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
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('equipments', 'public');
                $validated['image'] = $path;
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
        return view('', compact('equipment'));
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
            if ($request->hasFile('image')) {
                // Delete old image if exists
                //if ($equipment->image && \Storage::disk('public')->exists($equipment->image)) {
                //   \Storage::disk('public')->delete($equipment->image);
                //}

                $path = $request->file('image')->store('equipments', 'public');
                $validated['image'] = $path;
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
            //if ($equipment->image && \Storage::disk('public')->exists($equipment->image)) {
            //   \Storage::disk('public')->delete($equipment->image);
            //}

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
