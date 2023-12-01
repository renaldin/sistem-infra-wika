<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Landing extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        if (Session()->get('email')) {
            return redirect()->route('dashboard');
        }

        $data = [
            'title' => 'Wika'
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
