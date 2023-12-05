<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelActivity;
use App\Models\ModelAchievement;
use App\Models\ModelDetailAchievement;
use App\Models\ModelEvent;
use App\Models\ModelInfraNews;
use App\Models\ModelProyek;

class Landing extends Controller
{
    public $ModelActivity, $ModelAchievement, $ModelDetailAchievement, $ModelEvent, $ModelInfraNews, $ModelProyek;

    public function __construct()
    {
        $this->ModelActivity = new ModelActivity();
        $this->ModelAchievement = new ModelAchievement();
        $this->ModelDetailAchievement = new ModelDetailAchievement();
        $this->ModelEvent = new ModelEvent();
        $this->ModelInfraNews = new ModelInfraNews();
        $this->ModelProyek = new ModelProyek();
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
            'news'          => $this->ModelInfraNews->data(1),
            'event'         => $this->ModelEvent->data(1),
            'proyek'        => $this->ModelProyek->data(),
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

    public function detailNews($id_infra_news)
    {
        if (Session()->get('email')) {
            return redirect()->route('dashboard');
        }

        $data = [
            'title' => 'Wika',
            'detail'    => $this->ModelInfraNews->detail($id_infra_news),
        ];

        return view('landing.newsDetail', $data);
    }
}
