<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotFoundController extends Controller
{
    public function index()
    {
    	return view('admin.404');
    }
}
