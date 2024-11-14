<?php

namespace App\Http\Controllers;

use App\Models\Project;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::where('user_id', Auth::user()->id)->get();
        // return $project;

        return view('project.projects',[
            'projects' => Project::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create-project');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'status' => 'required|in:pending,completed'
        ]);

        Project::create([
            'user_id' => Auth::user()->id,
            'project_title' => $request->project_title,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Project add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        // $p = Project::where('id', $id)->first();
        // return $p->description;
        return view('project.edit-project',[
            'project' => Project::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function projectUpdate(Request $request, $id)
    {
        $request->validate([
            'project_title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'status' => 'required|in:pending,completed'
        ]);

        $project = Project::where('id', $id)->first();
        $time = now();
        $updateTime = new DateTime($project->updated_at);
        $createTime =new DateTime($project->created_at);

        // if($createTime->addMinutes(5)->isPast() && $updateTime->addMinutes(5)->isPast()) {
        //     return back()->with('error', 'Project can not update now');
        // }

        Project::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'project_title' => $request->project_title,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return back()->with('update', 'Project update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Project::where('id', $id)->delete();
        return back()->with('delete', 'Project delete successfully');
    }
}
