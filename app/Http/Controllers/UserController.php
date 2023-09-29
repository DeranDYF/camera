<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['activeMenu'] = 'user';
        $data['title'] = 'Users';
        $data['users'] = User::all();
        $data['role'] = Role::all();
        return view('admin/user', $data);
    }

    public function user_detail(Request $request)
    {
        $data['activeMenu'] = 'user';
        $data['title'] = 'Users';
        return view('user/user_detail', $data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'confirmPassword' => ['required', 'string', 'same:password'],
        ]);
    }

    //Fungsi Tambah User
    protected function create(Request $request)
    {
        User::create([
            'id_role' => $request->input('role'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        Session::flash('success', 'Success Added New User');
        return redirect('user');
    }

    //Fungsi Aksi Delete User

    protected function delete(Request $request)
    {

        User::find($request->id)->delete();
        Session::flash('success', 'Success Deleted User');

        return redirect('user');
    }

    //Fungsi Aksi Ubah User
    protected function edit(Request $request)
    {

        User::find($request->id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'id_role' => $request->input('role')
            ]);

        Session::flash('success', 'Success Edit User');
        return redirect('user');
    }
}