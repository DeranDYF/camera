<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['activeMenu'] = 'dashboard';
        $data['title'] = 'Dashboard';
        $data['carousel'] = Carousels::all();
        return view('home', $data);
    }

    public function get_all(Request $request)
    {
        if ($request->ajax()) {
            $carousels = Carousels::all(); // Mengambil semua data carousel dari model Carousel
    
            return response()->json($carousels); // Mengembalikan data dalam format JSON
        }
    }

    //Fungsi Tambah Carousel
    public function create(Request $request)
    {
        // dd($request->file('img'));
        $request->validate([
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->file('img')->isValid()) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $path = $file->move(public_path('doc'), $filename);
            if ($path == TRUE) {
                Carousels::create([
                    'title' => $request->input('title'),
                    'descriptions' => $request->input('descriptions'),
                    'img' => $filename,
                ]);
                Session::flash('success', 'Success Added New Carousel');
            } else {
                Session::flash('failed', 'Failed Added New Carousel');
            }
        } else {
            Session::flash('failed', 'Failed Upload File ');
        }
        return redirect('dashboard');
    }

    //Fungsi Aksi Delete Carousel
    protected function delete(Request $request)
    {
        $img = Carousels::find($request->id);
        $imageName = $img->img;

        $filePath = public_path('doc/' . $imageName);
        if (File::exists($filePath)) {
            File::delete($filePath);
        } else {
            return 'Gagal Menghapus File.';
        }

        Carousels::find($request->id)->delete();
        Session::flash('success', 'Success Deleted Carousel');

        return redirect('dashboard');
    }

    //Fungsi Aksi Ubah Carousel
    protected function edit(Request $request)
    {
        if ($request->hasFile('imgtest') && $request->file('imgtest')->isValid()) {
            dd($request->file('imgtest'));
        } else {
            return 'File tidak diunggah atau tidak valid.';
        }

        $request->validate([
            'test' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->file('test') != NULL) {
            $img = Carousels::find($request->id);
            $imageName = $img->img;

            $filePath = public_path('doc/' . $imageName);
            if (File::exists($filePath)) {
                File::delete($filePath);
            } else {
                return 'Gagal Menghapus File.';
            }
            $file = $request->file('img2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $file->move(public_path('doc'), $filename);
            Carousels::create([
                'title' => $request->input('title'),
                'descriptions' => $request->input('descriptions'),
                'img' => $filename,
            ]);
        } else {

            Carousels::find($request->id)
                ->update([
                    'title' => $request->input('title'),
                    'descriptions' => $request->input('descriptions'),
                ]);

            Session::flash('success', 'Success Edit Carousel');
        }
        return redirect('dashboard');
    }
}