<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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
        return view('home', $data);
    }

    //Fungsi Tambah Carousel
    protected function create(Request $request)
    {
        dd($request->all());
        Carousel::create([
            'title' => $request->input('title'),
            'descriptions' => $request->input('descriptions'),
            'img' => $request->file('img'),
        ]);
        Session::flash('success', 'Success Added New Carousel');
        return redirect('home');
    }

    //Fungsi Aksi Delete Carousel

    protected function delete(Request $request)
    {

        Carousel::find($request->id)->delete();
        Session::flash('success', 'Success Deleted Carousel');

        return redirect('home');
    }

    //Fungsi Aksi Ubah Carousel
    protected function edit(Request $request)
    {

        Carousel::find($request->id)
            ->update([
                'title' => $request->input('title'),
                'descriptions' => $request->input('descriptions'),
                'img' => $request->file('img')
            ]);

        Session::flash('success', 'Success Edit Carousel');
        return redirect('home');
    }
}
