<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectDetailRequest;
use App\Models\ProjectDetails;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=ProjectDetails::simplePaginate(5);

        return  view('backend.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectDetailRequest $request)
    {

        if (request()->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path =$request->file('image')->storeAs('public/project',$fileNameToStore);
        }
        $project = ProjectDetails::create([
            'name' =>Str::of($request->name)->trim()->ucfirst(),
            'slug'  =>Str::of($request->name)->slug(),
            'content' => $request->contents,
            'web_site'	=>$request->web_site,
            'image'=>   $fileNameToStore,
            'user_id' => auth()->user()->id
        ]);

        flash()->addSuccess('Proje Başarıyla Oluşturuldu');
        return redirect()->route('project.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = ProjectDetails::findOrFail($id);
        return  view('backend.project.update',compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectDetailRequest $request, $id)
    {
        $project = ProjectDetails::findOrFail($id);
        $project->name =Str::of($request->name)->trim()->ucfirst();
        $project->slug  =Str::of($request->name)->slug();
        $project->content = $request->contents;
        $project->web_site	= $request->web_site;
        $project->user_id =auth()->user()->id;

        if (request()->hasFile('image')) {

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path =$request->file('image')->storeAs('public/project',$fileNameToStore);

            $project->image=$fileNameToStore;

        }
            $project->save();
        flash()->addSuccess('Proje başarıyla güncellendi');
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = ProjectDetails::findOrFail($id);
        $project->delete();
        flash()->addSuccess('Proje Başarıyla Silindi');
        return redirect()->route('project.index');
    }


    public function status(Request $request)
    {

        $project = ProjectDetails::findOrFail($request->id);
        $project->status=$request->statu =="true" ? 1 : 0;
        $project->save();
        flash()->addSuccess('Proje durumu güncellendi');

    }
}
