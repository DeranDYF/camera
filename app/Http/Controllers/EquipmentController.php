<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\ImgEquipment;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class EquipmentController extends Controller
{
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
        $data['activeMenu'] = 'equipment';
        $data['title'] = 'Equipment';
        $data['equipment'] = Equipment::all();
        $data['img'] = ImgEquipment::all();
        $data['categories'] = Categories::all();
        $data['equipment_sample'] = Equipment::first();
        return view('admin/equipment', $data);
    }

    //Fungsi Tambah Equipment
    protected function create(Request $request)
    {
        $formattedNumber = $request->input('cost');
        $number = str_replace('.', '', $formattedNumber);
        
            $equipment = Equipment::create([
                'id_category' => $request->input('category'),
                'name' => $request->input('name'),
                'stock' => $request->input('stock'),
                'cost' => $number,
                'descriptions' => $request->input('descriptions'),
            ]);
                

        $files = $request->file('files');
        foreach ($files as $file) {
            // Mendapatkan nama asli file
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $path = $file->move(public_path('doc/product'), $filename);
            ImgEquipment::create([
                'id_equipment' => $equipment->id,
                'img' => $filename,
            ]);
            
            if($path == TRUE){
                Session::flash('success', 'Success Added New Equipment');
            } else {
                Session::flash('failed', 'Failed Added New Equipment');
            }
        }

        return redirect('equipment');
    }

    //Fungsi Aksi Delete Carousel

    protected function delete(Request $request)
    {

        $imgs = ImgEquipment::where('id_equipment', $request->id)->get();
        foreach ($imgs as $img) {
            $imageName = $img->img;    
            $filePath = public_path('doc/product/' . $imageName);
            
            if (File::exists($filePath)) {
                File::delete($filePath);
            } else {
                return 'Gagal Menghapus File.';
            }
        }
        ImgEquipment::where('id_equipment', $request->id)->delete();
        Equipment::find($request->id)->delete();
        Session::flash('success', 'Success Deleted Equipment');

        return redirect('equipment');
    }

    //Fungsi Aksi Ubah Carousel
    protected function edit(Request $request)
    {
        if ($request->hasFile('file')) {
            dd($request->file('file'));
        } else {
            return 'File tidak diunggah atau tidak valid.';
        }

        $formattedNumber = $request->input('cost');
        $number = str_replace('.', '', $formattedNumber);
        Equipment::find($request->id)
            ->update([
                'id_category' => $request->input('category'),
                'name' => $request->input('name'),
                'stock' => $request->input('stock'),
                'cost' => $number,
                'descriptions' => $request->input('descriptions'),
            ]);

        Session::flash('success', 'Success Edit Equipment');
        return redirect('equipment');
    }
}