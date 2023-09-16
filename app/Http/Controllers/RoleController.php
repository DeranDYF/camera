<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['activeMenu'] = 'role';
        $data['title'] = 'Roles';
        $data['role'] = Role::all();
        return view('admin/role', $data);
    }

    //Fungsi Tambah Role
    protected function create(Request $request)
    {
        // dd($request->all());
        Role::create([
            'name' => $request->input('name'),
            'descriptions' => $request->input('descriptions'),
        ]);
        Session::flash('success', 'Success Added New Role');
        return redirect('role');
    }

    //Fungsi Aksi Delete Role

    protected function delete(Request $request)
    {

        Role::find($request->id)->delete();
        Session::flash('success', 'Success Deleted Role');

        return redirect('role');
    }

    //Fungsi Aksi Ubah Role
    protected function edit(Request $request)
    {

        Role::find($request->id)
            ->update([
                'name' => $request->input('name'),
                'descriptions' => $request->input('descriptions'),
            ]);

        Session::flash('success', 'Success Edit Role');
        return redirect('role');
    }
}
