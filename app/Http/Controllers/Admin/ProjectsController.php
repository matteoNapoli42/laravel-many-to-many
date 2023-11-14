<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('type')->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_types = Type::all();
        return view('admin.projects.create', compact('all_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        if ($request->has('thumb')) {
            $file_path = Storage::put('thumbs', $request->thumb);
            $validated['thumb'] = $file_path;
        }
        $newProject = Project::create($validated);
        return to_route('projects.index')->with('message', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $all_types = Type::all();
        return view('admin.projects.edit', compact('project', 'all_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->all();
        if ($request->has['thumb']) {
            $newThumb = $request->thumb;
            $path = Storage::put('thumbs', $newThumb);
            if (!is_Null($project->thumb) && Storage::fileExists(($project->thumb))) {
                Storage::delete($project->thumb);
            }
        }
        $project->update($data);
        return to_route('projects.index', $project)->with('message', 'Project updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index')->with('message', 'Welldone! Comic Deleted Successfully');
    }
}
