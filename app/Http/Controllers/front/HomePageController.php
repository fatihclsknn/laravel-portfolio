<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\Contact\AdminInfoMail;
use App\Mail\Contact\UserInfoMail;
use App\Models\ConfigsModel;
use App\Models\Contact;
use App\Models\Contacts;
use App\Models\ProjectDetails;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomePageController extends Controller
{
    //

    public function __construct()
    {
        if (ConfigsModel::find(1)->active == 0) {
            return redirect()->to('site-bakimda')->send();
        }
        view()->share('config', ConfigsModel::find(1));
        view()->share('latestProject', ProjectDetails::all()->where('status','=','1')->sortByDesc('created_at')->take('3'));
    }

    public function index()
    {
        $user = User::whereId(1)->firstOrFail();
        return view('front.homePage', compact('user'));
    }

    public function resume()
    {
        $resumes = Resume::all()->sortByDesc('job_year');
        return view('front.resume', compact('resumes'));
    }

    public function project()
    {
        $projects = ProjectDetails::whereStatus(1)->orderBy('created_at','DESC')->simplePaginate(2);

        return view('front.project', compact('projects'));
    }

    public function contact(Request $request)
    {
        $contact = Contacts::whereId(1)->firstOrFail();
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required|min:2|max:255|string',
                'subject' => 'required|min:2|max:255|string',
                'email' => 'required|email',
                'message'=> 'required|min:2|string',

            ]);
            $contact_message = Contacts::create([
                'name'=>Str::of($request->name)->trim()->ucfirst(),
                'subject'=>Str::of($request->subject)->trim(),
                'email'=>Str::of($request->email)->trim(),
                'message'=>$request->message,
            ]);

            Mail::to($request->email)->send( new UserInfoMail($contact_message));
            Mail::to('blogsepeti.net@gmail.com')->send(new AdminInfoMail($contact_message));
            flash()->addSuccess('Lütfen mail kutunuz kontrol edin');
            return  redirect()->route('front.contact');
        }
        return view('front.contact', compact('contact'));
    }

    public function singleProject($slug)
    {
        $project = ProjectDetails::whereSlug($slug)->where('status','=','1')->firstOrFail();
        $previous = ProjectDetails::where('created_at', '<', $project->created_at)
            ->where('status', 1)
            ->latest()
            ->first();
        $next = ProjectDetails::where('created_at', '>', $project->created_at)
            ->where('status', 1)
            ->latest()
            ->first();
        return view('front.singleProject', compact('project', 'next', 'previous'));
    }
}
