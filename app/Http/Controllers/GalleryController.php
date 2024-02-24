<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $userID = Auth::id();
        $data = Image::with('user')->get();
        return view('user_galeri.index', compact('data'));
    }

    public function data_saya() {
        $user = auth()->user();

        $my_image = $user ? $user->images : [];

        return view('user_galeri.data_saya', compact('my_image'));
    }

    public function data() {
        return view('user_galeri.data');
    }

    public function store(Request $request)
    {
        $imagePath = $request->file('nama_file')->store('images', 'public');

        $userID = Auth::id();

        $image = new Image([
            'nama_foto' => $request->get('nama_foto'),
            'nama_file' => $imagePath,
            'deskripsi' => $request->get('deskripsi'),
            'id_pengguna' =>$userID,
        ]);

        $image->save();

        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $gallery = Image::find($id);
        $gallery->update($request->all());

        return redirect()->back()->with('success', 'Data berhasil diupdate');

    }

     public function destroy($id)
    {
        try {
             $data = Image::find($id);
             $data->delete();
             
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        }   catch (\Throwable $th) {
             // Tangani kesalahan jika ada
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data. Silakan coba lagi.');
        }
    }
     
    public function view($id) {
        $image = Image::findOrFail($id);
        $comment = Comment::all();
        return view('user_galeri.view', compact('image', 'comment'));
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'image_id' => 'required',
            'body' => 'required',
        ]);

        $comment = new Comment([
            'user_id' => auth()->user()->id,
            'image_id' => $request->image_id,
            'body' => $request->get('body'),
        ]);

        $comment->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
    
}