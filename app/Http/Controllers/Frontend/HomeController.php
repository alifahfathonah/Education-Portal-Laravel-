<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Blog;
use App\Model\Admin\BlogCategory;
use App\Model\Admin\Event;
use App\Model\Admin\Skill;
use App\Model\Admin\Team;
use App\Model\Admin\TeamPanelName;
use App\Model\Admin\Tips;
use App\Model\Frontend\Contact;
use Carbon\Carbon;
use http\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $event = Event::where('event_type','Event')->where('status',1)->whereDate('start_date','<=',Carbon::now())->orderByDesc('start_date')->limit(6)->get();
        $upComingEvents = Event::where('event_type','Event')->where('status',1)->whereDate('start_date','>',Carbon::now())->orderByDesc('start_date')->limit(3)->get();
        return view('frontend.index')
            ->with([
                'events'=>$event,
                'upcomingEvents'=>$upComingEvents
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
                'admins'=>$admin
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
                'admins'=>$admin
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
                'admins'=>$admin
            ]);
    }
    public function skillDetails($slug)
    {
        $skillDetails = Skill::where('status',1)
            ->where('slug',$slug)
            ->first();
        return $skillDetails;
    }
    public function interviewTips()
    {
        $interview = Tips::where('category','interview')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        $mostPopular = Tips::orderByDesc('id')->limit(5)->get();

        return view('frontend.tips_and_tricks.interview')
            ->with([
                'interviews'=>$interview,
                'populars'=>$mostPopular
            ]);
    }

    public function educationalTips()
    {
        $educational = Tips::where('category','educational')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return $educational;
    }

    public function careerAndPlaningTips()
    {
        $career = Tips::where('category','career and planing')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return $career;
    }

    public function othersTips()
    {
        $others = Tips::where('category','others')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return $others;
    }

    public function tipsDetails($slug)
    {
        return $slug;
    }

    public function blog()
    {
        $categories = BlogCategory::where('status',1)->orderByDesc('id')->get();
        $blogs = Blog::where('status',1)->orderByDesc('id')->get();
        $admins = Admin::all();
        return view('frontend.blog.blog')
            ->with([
                'categories'=>$categories,
                'blogs'=>$blogs,
                'admins'=>$admins
            ]);
    }
    public function category($category)
    {
        return $category;
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
        $team = Team::where('status',1)->get();
        return view('frontend.basic.team')
            ->with([
                'panelNames'=>TeamPanelName::where('status',1)->get(),
                'teams'=>$team
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
                'campaigns'=>$campaigns
            ]);
    }

    public function eventDetails($slug)
    {
        $event = Event::where('slug',$slug)->first();
        return $event;
    }
}
