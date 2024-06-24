<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectsList = Project::all();
        return view('admin.projects.index', compact('projectsList'));
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
        $data = $request->validated();
        $newItem = new Project();
        $newItem->fill($data);
        if (isset($data['cover_image'])) {
            $newItem->cover_image = Storage::put('img', $data['cover_image']);
        }
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
        return view("admin.projects.show", compact("project"));
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
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        // questo metodo crea la copia esatta del titolo è quindi non va bene.
        // $data['slug'] = $data['title'];
        //usiamo questo metodo perche lo slug si basa sul titolo ma elimina gli spazi e lo rende minuscolo.

        if (isset($data['cover_image'])) {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }
            $data['cover_image'] = Storage::put('img', $data['cover_image']);
        }
        // remove image without add other
        if($request['removeImage'] != NULL && $project->cover_image != NULL){
            Storage::delete($project->cover_image);
            $project->cover_image = NULL;
        }
        // /remove image without add other

        $data['slug'] = Str::slug($data['title']);
        $project->update($data);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'il progetto ' .  $project->title . ' è stato cancellato');
    }

    // show the trashed projects
    public function trash()
    {
        $trashList = Project::onlyTrashed()->get();
        return view('admin.projects.trash', compact('trashList'));
    }

    // permanently delete a record
    public function forceDelete($id){
        $project = Project::onlyTrashed()->where('id', $id)->firstOrFail();
        Project::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('admin.projects.trash')->with('message' , 'il progetto '. $project->title .' è stato cancellato definitivamente');
    }

    // restore a record
    public function restore($id){
        $project = Project::onlyTrashed()->where('id', $id)->firstOrFail();
        Project::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.projects.trash')->with('message' , 'il progetto '. $project->title .' è stato ripristinato');
    }

    // restore all record
    public function restoreAll(){
        Project::onlyTrashed()->restore();
        return redirect()->route('admin.projects.trash')->with('message' , 'sono sati ripristinati tutti i progetti');
    }
}
