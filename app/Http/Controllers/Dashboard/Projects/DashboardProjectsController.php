<?php

namespace App\Http\Controllers\Dashboard\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('dashboard.projects.index', compact('projects'));
    }

    /**
     * store
     *
     * @param  Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            'badges' => 'nullable|array',
            'badges.*' => 'string'
        ]);

        try {
            DB::beginTransaction();

            $path = $request->file('image')->store('projects', 'public');

            Project::create([
                'category' => $request->category,
                'title' => $request->title,
                'description' => $request->description,
                'image' => 'storage/' . $path,
                'badges' => $request->badges ?? [],
            ]);

            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Project store failed', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Failed to create project. Please try again.');
        }
    }
    
    /**
     * show
     *
     * @param  Project $project
     * @return void
     */
    public function show(Project $project)
    {
        return view('dashboard.projects.show', compact('project'));
    }
    
    /**
     * edit
     *
     * @param  Project $project
     * @return void
     */
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }
    
    /**
     * update
     *
     * @param  Request $request
     * @param  Project $project
     * @return void
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'badges' => 'nullable|array',
            'badges.*' => 'string',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->only(['category', 'title', 'description', 'badges']);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('projects', 'public');
                $data['image'] = 'storage/' . $path;
            }

            $project->update($data);

            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Project update failed', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Failed to update project. Please try again.');
        }
    }
    
    /**
     * destroy
     *
     * @param  Project $project
     * @return void
     */
    public function destroy(Project $project)
    {
        try {
            DB::beginTransaction();

            $project->delete();

            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Project deletion failed', ['error' => $e->getMessage()]);
            return redirect()
                ->back()
                ->with('error', 'Failed to delete project. Please try again.');
        }
    }
}
