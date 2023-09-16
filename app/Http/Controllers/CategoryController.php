<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['activeMenu'] = 'category';
        $data['title'] = 'Category';
        return view('admin/category', $data);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }
    //Fungsi Tambah Category
    protected function create(Request $request)
    {
        Category::create([
            'name' => $request->input('name'),
            'descriptions' => $request->input('descriptions'),
        ]);
        Session::flash('success', 'Success Added New Category');
        return redirect('category');
    }

    //Fungsi Aksi Delete Category

    protected function delete(Request $request)
    {

        Category::find($request->id)->delete();
        Session::flash('success', 'Success Deleted Category');

        return redirect('category');
    }

    //Fungsi Aksi Ubah Category
    protected function edit(Request $request)
    {

        Category::find($request->id)
            ->update([
                'name' => $request->input('name'),
                'descriptions' => $request->input('descriptions'),
            ]);

        Session::flash('success', 'Success Edit Category');
        return redirect('category');
    }
}
