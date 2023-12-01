<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function create()
    {
        return view('staff.add');
    }

    // public function store the value to a table
    public function store(Request $request)
    {
        $request->validate([
            'id_staff' => 'required',
            'nama_staff' => 'required',
            'kontak_staff' => 'required',
        ]);

        DB::insert(
            'INSERT INTO staff (id_staff, nama_staff, kontak_staff, status) VALUES (:id_staff, :nama_staff, :kontak_staff, "AV")',
            [
                'id_staff' => $request->id_staff,
                'nama_staff' => $request->nama_staff,
                'kontak_staff' => $request->kontak_staff,
            ]
        );
        return redirect()->route('staff.index')->with('success', 'Data berhasil disimpan');
    }

    // public function show all values from a table
    public function index()
    {
        $datas = DB::select('SELECT * from staff WHERE status = "AV"');
        return view('staff.index')->with('datas', $datas);
        // $datas = DB::table('mobil')->orderBy('no_VIN', 'desc')->get();
    } 
    public function ascend()
{
    $datas = DB::select('SELECT * from staff ORDER BY id_staff ASC');

    return view('staff.index', ['datas' => $datas]);
}

    public function descend()
{
    $datas = DB::select('SELECT * from staff ORDER BY id_staff DESC');

    return view('staff.index', ['datas' => $datas]);
}
    
    // public function edit a row from a table
    public function edit($id)
    {
        $datas = DB::select('SELECT * FROM staff WHERE id_staff = :id', ['id' => $id]);
        $data = $datas[0];
        return view('staff.edit')->with('data', $data);
    }

    // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'id_staff' => 'required',
            'nama_staff' => 'required',
            'kontak_staff' => 'required',
        ]);

        // DB::update(
        //     'UPDATE mobil SET no_VIN = :no_VIN, model = :model, tahun_produksi = :tahun_produksi, warna = :warna, harga = :harga, id_pabrik = :id_pabrik WHERE no_VIN = :no_VIN;',
        //     [
        //         'no_VIN' => $request->no_VIN,
        //         'model' => $request->model,
        //         'tahun_produksi' => $request->tahun_produksi,
        //         'warna' => $request->warna,
        //         'harga' => $request->harga,
        //         'id_pabrik' => $request->id_pabrik,
        //     ]
        // );

        DB::statement("
        UPDATE kaset 
        SET id_staff = :new_id_staff, 
            nama_staff = :new_nama_staff, 
            kontak_staff = :new_kontak_staff
        WHERE id_staff = :old_id_kaset;
    ", [
        'new_id_staff' => $request->input('id_staff'),
        'old_id_staff' => $request->input('id_staff'),
        'new_nama_staff' => $request->input('nama_staff'),
        'new_kontak_staff' => $request->input('kontak_staff'),
    ]);

        return redirect()->route('staff.index')->with('success', 'Data berhasil diubah');
    }

    // public function to delete a row from a table
    public function delete($id)
    {
        DB::delete('DELETE FROM staff WHERE id_staff = :id_staff', ['id_staff' => $id]);
        return redirect()->route('staff.index')->with('success', 'Data berhasil dihapus');
    }

    public function softDelete($id, Request $request)
    {
        DB::statement(" UPDATE staff SET status = 'NAV' WHERE id_staff = :id;", ['id' => $id]);

        return redirect()->route('staff.index')->with('success', 'Data berhasil diubah');
    }

    public function restore($id, Request $request)
    {
        DB::statement(" UPDATE staff SET status = 'AV' WHERE id_staff = :id;", ['id' => $id]);

        return redirect()->route('admin.bindua')->with('success', 'Data berhasil diubah');
    }
}