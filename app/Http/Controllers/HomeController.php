<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $website = Website::all();
    return view('home', compact('website'));
  }

  public function viewWebsite(string $slug)
  {
    $website = Website::where('slug', $slug)->first();
    return view('website-view', compact('website'));
  }
}
