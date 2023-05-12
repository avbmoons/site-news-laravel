<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }

    public function createMail(): View
    {
        return \view('mail');
    }

    public function storeMail(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'comment' => 'required',
        ]);
        return response()->json($request->only(['username', 'comment']));
    }

    public function createOrder(): View
    {
        return \view('order');
    }

    public function storeOrder(Request $request)
    {
        //
    }
}
