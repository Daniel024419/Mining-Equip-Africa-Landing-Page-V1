<?php

namespace App\Http\Controllers\Dashboard\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Service\FileUploadInterface;

class DashboardServicesController extends Controller
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

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = $this->fileUploadInterface->uploadFiles($request->file('image'), $this->destinationPath);
            } else {
                $data['image'] = 'defualt.png';
            }

            Service::create($data);

            DB::commit();

            return redirect()->back()->with('success', 'Service created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create service.' . $e->getMessage());
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

            $oldimageName = $project->image ?? '';

            $imageFile = $request->has('image') ? $request->file('image') : '';

            if ($imageFile && $imageFile->isValid()) {
                $data['image'] = $this->fileUploadInterface->uploadFiles($imageFile, $this->destinationPath);
                if (file_exists($this->destinationPath . '/' . $oldimageName)) {
                    unlink($this->destinationPath . '/' . $oldimageName);
                }
            } else {
                $data['image'] = $oldimageName;
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
                if (file_exists($this->destinationPath . '/' . $service->image)) {
                    unlink($this->destinationPath . '/' . $service->image);
                }
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
