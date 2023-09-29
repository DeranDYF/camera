<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['activeMenu'] = 'category';
        $data['title'] = 'Category';
        $data['category'] = Categories::all();
        return view('admin/categories', $data);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }
    
    //Fungsi Tambah Categories
    protected function create(Request $request)
    {
        // dd($request->file('img'));
        $request->validate([
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->file('img')->isValid()) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $path = $file->move(public_path('doc/category'), $filename);
            if ($path == TRUE) {
                Categories::create([
                    'name' => $request->input('name'),
                    'descriptions' => $request->input('descriptions'),
                    'img' => $filename,
                ]);
                Session::flash('success', 'Success Added New Category');
            } else {
                Session::flash('failed', 'Failed Added New Category');
            }
        } else {
            Session::flash('failed', 'Failed Upload File ');
        }
        return redirect('category');
    }

    //Fungsi Aksi Delete Categories

        //Fungsi Aksi Delete Carousel
        protected function delete(Request $request)
        {
            $img = Categories::find($request->id);
            $imageName = $img->img;
    
            $filePath = public_path('doc/category/' . $imageName);
            if (File::exists($filePath)) {
                File::delete($filePath);
            } else {
                return 'Gagal Menghapus File.';
            }
    
            Categories::find($request->id)->delete();
            Session::flash('success', 'Success Deleted Categories');
    
            return redirect('category');
        }

    //Fungsi Aksi Ubah Categories
    protected function edit(Request $request)
    {

        Categories::find($request->id)
            ->update([
                'name' => $request->input('name'),
                'descriptions' => $request->input('descriptions'),
            ]);

        Session::flash('success', 'Success Edit Category');
        return redirect('category');
    }
}