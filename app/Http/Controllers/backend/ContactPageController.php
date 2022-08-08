<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactPageController extends Controller
{
    public function index()
    {
        $contact = Contacts::whereId(1)->firstOrFail();
        return view('backend.contact.update',compact('contact'));
    }

    public function editUser(Request $request)
    {
        $request->validate([
            'page_content' => 'required|min:3|max:255'
        ]);
        $contact = Contacts::whereId(1)->firstOrFail();
        $contact->page_content = $request->page_content;

        if (request()->hasFile('image')) {
            $this->validate(request(), [
                'image' => 'mimes:jpg,png,svg,jpeg|max:4096'
            ]);
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path =$request->file('image')->storeAs('public/user',$fileNameToStore);

            $contact->image=$fileNameToStore;
        }
        $contact->save();
        flash()->addSuccess('Sayfa başarıyla güncellendi');
        return redirect()->route('admin.contact');
    }


}
