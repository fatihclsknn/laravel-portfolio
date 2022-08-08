<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResumeRequest;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumes=Resume::simplePaginate(5);

        return  view('backend.resume.index',compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.resume.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResumeRequest $request)
    {
        $resume = Resume::create([
            'job_title'=> Str::of($request->job_title)->trim()->ucfirst(),
            'company_name'=> Str::of($request->company_name)->trim()->ucfirst(),
            'description'=> $request->description,
            'job_year'=> $request->job_year,
            'user_id' => auth()->user()->id,
            'experiences_or_education'=> $request->experiences_or_education,
        ]);

        flash()->addSuccess('Öz Geçmiş Başarıyla Oluşturuldu');
        return redirect()->route('resume.index');
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
        $resume = Resume::findOrFail($id);
        return  view('backend.resume.update',compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResumeRequest $request, $id)
    {
        $resume = Resume::findOrFail($id);
        $resume->job_title= Str::of($request->job_title)->trim()->ucfirst();
        $resume -> company_name= Str::of($request->company_name)->trim()->ucfirst();
        $resume->description = $request->description;
        $resume ->job_year = $request->job_year;
        $resume ->user_id = auth()->user()->id;
        $resume -> experiences_or_education= $request->experiences_or_education;
        $resume->save();
        flash()->addSuccess('Başarıyla Güncellendi');
        return  redirect()->route('resume.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resume = Resume::findOrFail($id);
        $resume->delete();
        flash()->addSuccess('Başarıyla Silindi');
        return  redirect()->route('resume.index');
    }


    public function status(Request $request)
    {

        $resume = Resume::findOrFail($request->id);
        $resume->experiences_or_education=$request->statu =="true" ? 1 : 0;
        $resume->save();
        flash()->addSuccess('Öz geçmiş durumu güncellendi');
        return  redirect()->route('resume.index');

    }

}
