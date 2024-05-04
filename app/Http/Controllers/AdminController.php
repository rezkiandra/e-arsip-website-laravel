<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
  public function dashboard()
  {
    $website = Website::all();
    return view('admin.dashboard', compact('website'));
  }

  public function listWebsite()
  {
    $website = Website::paginate(10);
    return view('admin.website.index', compact('website'));
  }

  public function addWebsite()
  {
    return view('admin.website.add');
  }

  public function viewWebsite(string $slug)
  {
    $website = Website::where('slug', $slug)->first();
    return view('admin.website.view', compact('website'));
  }

  public function storeWebsite(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:30',
      'url' => 'required|url',
      'description' => 'required',
      'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:512',
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);
    } else {
      Website::create([
        'uuid' => Str::uuid('id'),
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'url' => $request->url,
        'description' => $request->description,
        'logo' => $request->logo->store('website-logo', 'public'),
      ]);

      Alert::toast('Berhasil menambah website', 'success');
      return redirect()->route('admin.website');
    }
  }

  public function editWebsite(string $uuid)
  {
    $website = Website::where('uuid', $uuid)->first();
    return view('admin.website.edit', compact('website'));
  }

  public function updateWebsite(Request $request, string $uuid)
  {
    $website = Website::where('uuid', $uuid)->first();
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:30',
      'url' => 'required|url',
      'description' => 'required|max:255',
      'logo' => 'required_if:logo,null|image|mimes:jpeg,png,jpg,gif,svg,webp|max:512',
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);
    }

    if ($request->hasFile('logo')) {
      if ($website->logo) {
        Storage::delete('public/' . $website->logo);
      }
      $website->update([
        'logo' => $request->logo->store('website-logo', 'public'),
      ]);
    } else {
      $website->update([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'url' => $request->url,
        'description' => $request->description,
      ]);
    }

    Alert::toast('Berhasil mengupdate website', 'success');
    return redirect()->route('admin.website');
  }

  public function deleteWebsite(string $uuid)
  {
    $website = Website::where('uuid', $uuid)->first();
    if ($website->logo) {
      Storage::delete('public/' . $website->logo);
    }
    $website->delete();

    Alert::toast('Berhasil menghapus website', 'success');
    return redirect()->route('admin.website');
  }
}
