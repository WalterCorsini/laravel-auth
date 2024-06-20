<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectsList = Project::all();
        return view('admin.projects.index',compact('projectsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->all();
        $newItem = new Project();
        $newItem->title = $data['title'];
        $newItem->description = $data['description'];
        $newItem->slug = Str::slug($newItem->title);
        $newItem->save();
        return redirect()->route("admin.projects.index");
    }

    /**
     * Display the specified resource.
     */

// the method is passed an object as a parameter
// in this case this method handles the exception by sending us to page 404 automatically
    public function show(Project $project)
    {
        return view("admin.projects.show",compact("project"));
    }


// the slug that is searched for in the table is passed to the method as a parameter.
// in this case the exceptions are not handled automatically and we create a condition to handle them
    // public function show(string $slug)
    // {
    //     $project = Project::where('slug', $slug)->first();
    //     if(!$project) {
    //         abort(404);
    //     }
    //     return view('admin.projects.show', compact('project'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // use dipendency injection to pass Slug
    public function edit(Project $project)
    {
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->title = $request->title;
        $project->description =$request->description;
        $project->save();
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
