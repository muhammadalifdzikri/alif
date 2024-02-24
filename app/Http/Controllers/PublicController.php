<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;

class PublicController extends Controller
{
    public function index() {
        $userID = Auth::id();
        $data = Image::with('user')->get();
        return view('galeri.index', compact('data'));
    }

    public function view_image($id) {
        $image = Image::findOrFail($id);
        return view('galeri.view_image', compact('image'));
    }
}
