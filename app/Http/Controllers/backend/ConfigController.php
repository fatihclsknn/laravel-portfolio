<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ConfigsModel;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $config = ConfigsModel::find(1);
        return view('backend.config.index',compact('config'));
    }

    public function update(Request  $request)
    {
        $config = ConfigsModel::find(1);
        $config->github=$request->github;
        $config->linkedin=$request->linkedin;
        $config->active=$request->active;


        if (request()->hasFile('logo')) {

            $this->validate(request(), [
                'logo' => 'mimes:jpg,png,svg,jpeg|max:4096'
            ]);

            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path =$request->file('logo')->storeAs('public/logo',$fileNameToStore);

            $config->logo=$fileNameToStore;

        }
        $config->save();
        flash()->addSuccess('Ayarlar Başarı ile güncellendi');
        return redirect()->back();

    }

}
