<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        return view('admin.home');
    }

    public function categories()
    {
        return view('admin.categories');
    }

    public function news()
    {
        return view('admin.news');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function about()
    {
        return view('admin.about');
    }

    public function mails()
    {
        return view('admin.mails');
    }

    public function orders()
    {
        return view('admin.orders');
    }
}
