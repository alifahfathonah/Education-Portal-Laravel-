<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Skill;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function information()
    {
        return view('frontend.information');
    }
    public function softSkill()
    {
        $admin = Admin::all();
        $softSkill = Skill::where('category','soft skill')->where('status',1)->orderBy('id','DESC')->paginate(1);
        return view('frontend.skill_development.softskill')
            ->with([
                'skills'=>$softSkill,
                'admins'=>$admin
            ]);
    }
    public function softSkillDetails($slug)
    {
        $skillDetails = Skill::where('status',1)->where('slug',$slug)->first();
        return $skillDetails;
    }
    public function academicSkill()
    {
        $admin = Admin::all();
        $academicSkill = Skill::where('category','academic skill')->where('status',1)->orderBy('id','DESC')->paginate(1);
        return view('frontend.skill_development.academic')
            ->with([
                'skills'=>$academicSkill,
                'admins'=>$admin
            ]);
    }
    public function professionalSkill()
    {
        $admin = Admin::all();
        $professionalSkill = Skill::where('category','professional skill')->where('status',1)->orderBy('id','DESC')->paginate(1);
        return view('frontend.skill_development.professional')
            ->with([
                'skills'=>$professionalSkill,
                'admins'=>$admin
            ]);
    }
}
