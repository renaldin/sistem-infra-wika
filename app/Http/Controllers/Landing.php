<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelActivity;
use App\Models\ModelAchievement;
use App\Models\ModelDetailAchievement;
use App\Models\ModelEvent;

class Landing extends Controller
{
    public $ModelActivity, $ModelAchievement, $ModelDetailAchievement, $ModelEvent;

    public function __construct()
    {
        $this->ModelActivity = new ModelActivity();
        $this->ModelAchievement = new ModelAchievement();
        $this->ModelDetailAchievement = new ModelDetailAchievement();
        $this->ModelEvent = new ModelEvent();
    }

    public function index()
    {
        if (Session()->get('email')) {
            return redirect()->route('dashboard');
        }

        $data = [
            'title'         => 'Wika',
            'activities'    => $this->ModelActivity->data(1),
            'achievement'   => $this->ModelAchievement->data(1),
            'detailAchievement'   => $this->ModelDetailAchievement->data(),
            'event'         => $this->ModelEvent->data(1),
        ];

        return view('landing.index', $data);
    }

    public function about()
    {
        if (Session()->get('email')) {
            return redirect()->route('dashboard');
        }

        $data = [
            'title' => 'Wika'
        ];

        return view('landing.about', $data);
    }

    public function contact()
    {
        if (Session()->get('email')) {
            return redirect()->route('dashboard');
        }

        $data = [
            'title' => 'Wika'
        ];

        return view('landing.contact', $data);
    }

    public function blog()
    {
        if (Session()->get('email')) {
            return redirect()->route('dashboard');
        }

        $data = [
            'title' => 'Wika'
        ];

        return view('landing.blogDetail', $data);
    }
}
