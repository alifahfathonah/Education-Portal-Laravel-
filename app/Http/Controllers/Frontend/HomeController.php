<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Admin\Activity;
use App\Model\Admin\ActivityPanel;
use App\Model\Admin\ActivityPost;
use App\Model\Admin\Admin;
use App\Model\Admin\Blog;
use App\Model\Admin\BlogCategory;
use App\Model\Admin\Event;
use App\Model\Admin\Partner;
use App\Model\Admin\Skill;
use App\Model\Admin\Slider;
use App\Model\Admin\SuccessStory;
use App\Model\Admin\Team;
use App\Model\Admin\TeamPanelName;
use App\Model\Admin\Tips;
use App\Model\Admin\Video;
use App\Model\Frontend\Contact;
use App\User;
use Carbon\Carbon;
use http\Message;
use Illuminate\Http\Request;
use function React\Promise\all;

class HomeController extends Controller
{
    public function index()
    {
        $event = Event::where('event_type','Event')
            ->where('status',1)
            ->whereDate('start_date','<=',Carbon::now())
            ->orderByDesc('start_date')
            ->limit(6)
            ->get();
        $upComingEvents = Event::where('event_type','Event')
            ->where('status',1)
            ->whereDate('start_date','>',Carbon::now())
            ->orderByDesc('start_date')
            ->limit(3)
            ->get();
        $latestBlog = Blog::where('status',1)
            ->limit(6)
            ->get();
        $videos = Video::where('status',1)
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();
        $successStories = SuccessStory::where('status',1)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
        $sliders = Slider::where('status',1)
            ->orderBy('priority','ASC')
            ->get();
        $activities = Activity::where('status',1)
            ->get();
        return view('frontend.index')
            ->with([
                'events'=>$event,
                'upcomingEvents'=>$upComingEvents,
                'latestBlog' => $latestBlog,
                'admins'=>Admin::all(),
                'videos'=>$videos,
                'successStories'=>$successStories,
                'sliders'=>$sliders,
                'activities'=>$activities
            ]);
    }
    public function information()
    {
        return view('frontend.information');
    }
    public function softSkill()
    {
        $admin = Admin::all();
        $softSkill = Skill::where('category','soft skill')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);

        return view('frontend.skill_development.softskill')
            ->with([
                'skills'=>$softSkill,
                'admins'=>$admin,
            ]);
    }

    public function academicSkill()
    {
        $admin = Admin::all();
        $academicSkill = Skill::where('category','academic skill')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);

        return view('frontend.skill_development.academic')
            ->with([
                'skills'=>$academicSkill,
                'admins'=>$admin,
            ]);
    }
    public function professionalSkill()
    {
        $admin = Admin::all();
        $professionalSkill = Skill::where('category','professional skill')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return view('frontend.skill_development.professional')
            ->with([
                'skills'=>$professionalSkill,
                'admins'=>$admin,
            ]);
    }
    public function skillDetails($slug)
    {
        $skillDetails = Skill::where('status',1)
            ->where('slug',$slug)
            ->first();
        $relatedSkill = Skill::where('status',1)
            ->orderByDesc('created_at')
            ->get();
        return view('frontend.skill_development.details')
            ->with([
                'skill'=>$skillDetails,
                'admins'=>Admin::all(),
                'relateds'=>$relatedSkill,
            ]);
    }
    public function interviewTips()
    {
        $interview = Tips::where('category','interview')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return view('frontend.tips_and_tricks.interview')
            ->with([
                'interviews'=>$interview,
            ]);
    }

    public function educationalTips()
    {
        $educational = Tips::where('category','educational')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return view('frontend.tips_and_tricks.educational')
        ->with([
            'interviews'=>$educational,
        ]);
    }

    public function careerAndPlaningTips()
    {
        $career = Tips::where('category','career and planing')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return view('frontend.tips_and_tricks.career')
            ->with([
                'interviews'=>$career,
            ]);
    }

    public function othersTips()
    {
        $others = Tips::where('category','others')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return view('frontend.tips_and_tricks.others')
            ->with([
                'interviews'=>$others,
            ]);
    }
    public function tipsDetails($slug)
    {
        $tips = Tips::where('status',1)
            ->where('slug',$slug)
            ->first();
        $popular = Tips::where('status',1)
            ->orderByDesc('created_at')
            ->get();
        return view('frontend.tips_and_tricks.details')
            ->with([
                'tips'=>$tips,
                'admins'=>Admin::all(),
                'relateds'=>$popular,
            ]);
    }

    public function blog()
    {
        $categories = BlogCategory::where('status',1)
            ->orderByDesc('id')
            ->get();
        $blogs = Blog::where('status',1)
            ->orderByDesc('created_at')
            ->paginate(6);
        $admins = Admin::all();
        return view('frontend.blog.blog')
            ->with([
                'categories'=>$categories,
                'blogs'=>$blogs,
                'admins'=>$admins,
            ]);
    }
    public function category($category)
    {
        $blog = Blog::where('status',1)
            ->where('category',$category)
            ->orderByDesc('created_at')
            ->paginate(6);
        $categories = BlogCategory::where('status',1)
            ->orderByDesc('id')
            ->get();
        $admins = Admin::all();
        return view('frontend.blog.category_blog')
            ->with([
                'categories'=>$categories,
                'blogs'=>$blog,
                'admins'=>$admins,

            ]);
    }

    public function blogDetails($slug)
    {
        $blog = Blog::with('blogcategories')
            ->where('status',1)
            ->where('slug',$slug)
            ->first();
        $relateds = Blog::where('status',1)
            ->orderByDesc('created_at')
            ->get();
        return view('frontend.blog.details')
            ->with([
                'blog'=>$blog,
                'admins'=>Admin::all(),
                'relateds'=>$relateds,

            ]);
    }
    public function about()
    {
        return view('frontend.basic.about');
    }

    public function contactUs()
    {
        return view('frontend.basic.contact-us');
    }
    public function contactStore(Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:255'],
            'email'=>['required','email','max:255'],
            'phone'=>['required','max:15'],
            'subject'=>['required','max:255'],
            'message'=>['required']
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        alert('Contact Us')->success('Success','Message sent successfully..!!');
        return redirect()->back();
    }
    //For SOE Team
    public function soeTeam()
    {
        return view('frontend.basic.team')
            ->with([
                'panelNames'=>TeamPanelName::where('status',1)->get(),
                'teams'=>Team::where('status',1)->get()
            ]);
    }

    public function bloodDonation()
    {
        return view('frontend.basic.blood-donation');
    }

    public function eventCampaign()
    {
        $event = Event::where('event_type','Event')
            ->where('status',1)
            ->orderByDesc('start_date')
            ->paginate(8);
        $campaigns = Event::where('event_type','Campaign')
            ->where('status',1)
            ->orderByDesc('start_date')
            ->paginate(8);

        return view('frontend.event.index')
            ->with([
                'events'=>$event,
                'campaigns'=>$campaigns,

            ]);
    }

    public function eventDetails($slug)
    {
        $event = Event::where('slug',$slug)
            ->where('status',1)
            ->first();
        $allPrograme = Event::where('status',1)
            ->orderByDesc('start_date')
            ->get();
        return view('frontend.event.details')
            ->with([
                'event'=>$event,
                'admins'=>Admin::all(),
                'relateds'=>$allPrograme,

            ]);
    }

    public function activityName($slug)
    {
        return view('frontend.activity.index')
            ->with([
                'activity'=>Activity::where('slug',$slug)->first(),
                'activityPosts'=>ActivityPost::where('status',1)->orderByDesc('id')->get(),
                'activityPanelName' =>ActivityPanel::where('status',1)->orderByDesc('id')->get()
            ]);
    }

    public function activityPostDetails($slug)
    {
        return view('frontend.activity.details')
            ->with([
                'activityPost'=>ActivityPost::where('slug',$slug)->first(),
                'admins'=>Admin::all(),
            ]);

    }
    public function uploadDocument()
    {
        return view('frontend.basic.upload-document');
    }

    public function tryingUpload(Request $request)
    {
        return $request->all();
    }

    public function videoGallery()
    {
        $videos = Video::where('status',1)
            ->orderByDesc('created_at')
            ->paginate(12);
        return view('frontend.basic.video-gallery')
            ->with([
                'videos'=>$videos

            ]);
    }

    public function validUser(Request $request)
    {
        $email = User::where('email',$request->email)
            ->first();
        if ($email){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }

    public function attemptRegisterValidation(Request $request)
    {
        $email = User::where('email',$request->email)
            ->first();
        if ($email){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }
}
