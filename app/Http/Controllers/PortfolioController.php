<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $profile = Profile::first();          // 取第一条（也是唯一一条）个人信息

        return view('portfolio', [
            'name' => $profile->name,
            'title' => $profile->title,
            'subtitle' => $profile->subtitle,

            'skills' => Skill::orderBy('sort_order')->get(),
            'projects' => Project::orderBy('sort_order')->get(),
            'experiences' => Experience::orderBy('sort_order')->get(),
        ]);
    }
}
