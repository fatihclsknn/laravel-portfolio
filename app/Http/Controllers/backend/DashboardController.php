<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function editUser(UserRequest $request)
    {
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->description = $request->description;
            $user->title = $request->title;
            $user->linkedin = $request->linkedin;
            $user->github = $request->github;

        if (request()->hasFile('image')) {
            $this->validate(request(), [
                'image' => 'required|mimes:jpg,png,svg,jpeg|max:4096'
            ]);
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path =$request->file('image')->storeAs('public/user',$fileNameToStore);

            $user->image=$fileNameToStore;
        }
        $user->save();
        flash()->addSuccess('Kullancı başarıyla güncellendi');
        return redirect()->route('admin.index');


    }
}
