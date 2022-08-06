<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\ProjectDetails;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //

    public function __construct()
    {
        view()->share('latestProject', ProjectDetails::all()->sortByDesc('created_at')->take('3'));
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
        $projects = ProjectDetails::all();

        return view('front.project', compact('projects'));
    }

    public function contact()
    {
        $contact = Contacts::whereId(1)->firstOrFail();
        return view('front.contact', compact('contact'));
    }

    public function singleProject($slug)
    {
        $project = ProjectDetails::whereSlug($slug)->firstOrFail();
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
