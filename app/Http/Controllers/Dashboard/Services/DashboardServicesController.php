<?php

namespace App\Http\Controllers\Dashboard\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::query()->latest()->paginate(10);
        return view('dashboard.services.index', ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:3072', // 3MB
        ]);

        DB::beginTransaction();

        try {
            $data = $request->only(['title', 'description', 'category', 'icon']);

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('services', 'public');
            }

            Service::create($data);

            DB::commit();

            return redirect()->back()->with('success', 'Service created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create service.'.$e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('dashboard.services.show', compact('service'));
    }
        
    /**
     * edit
     *
     * @param  Service $service
     * @return void
     */
    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:3072',
        ]);

        DB::beginTransaction();

        try {

            $data = $request->only(['title', 'description', 'category', 'icon']);

            if ($request->hasFile('image')) {
                if ($service->image) {
                    //Storage::disk('public')->delete($service->image);
                }
                $data['image'] = $request->file('image')->store('services', 'public');
            }

            $service->update($data);

            DB::commit();

            return redirect()->back()->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update service.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        DB::beginTransaction();

        try {

            if ($service->image) {
                //Storage::disk('public')->delete($service->image);
            }

            $service->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete service.');
        }
    }
}
