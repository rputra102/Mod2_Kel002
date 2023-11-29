<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.add');
    }

    // public function store the value to a table
    public function store(Request $request)
    {
        $request->validate([
            'no_VIN' => 'required',
            'model' => 'required',
            'tahun_produksi' => 'required',
            'warna' => 'required',
            'harga' => 'required',
            'id_pabrik' => 'required',
        ]);

        DB::insert(
            'INSERT INTO mobil(no_VIN,model, tahun_produksi, warna, harga, id_pabrik) VALUES (:no_VIN, :model, :tahun_produksi, :warna, :harga, :id_pabrik)',
            [
                'no_VIN' => $request->no_VIN,
                'model' => $request->model,
                'tahun_produksi' => $request->tahun_produksi,
                'warna' => $request->warna,
                'harga' => $request->harga,
                'id_pabrik' => $request->id_pabrik,
            ]
        );
        return redirect()->route('admin.index')->with('success', 'Data berhasil disimpan');
    }

    // public function show all values from a table
    public function index()
    {
        $datas = DB::select('SELECT M.no_VIN, M.model, M.tahun_produksi, M.warna, M.harga, P.id_pabrik, P.lokasi, P.inspektur FROM mobil M INNER JOIN pabrik P ON M.id_pabrik = P.id_pabrik',);
        return view('admin.index')->with('datas', $datas);
        // $datas = DB::table('mobil')->orderBy('no_VIN', 'desc')->get();
    } 
    public function ascend()
{
    $datas = DB::select('SELECT M.no_VIN, M.model, M.tahun_produksi, M.warna, M.harga, P.id_pabrik, P.lokasi, P.inspektur FROM mobil M INNER JOIN pabrik P ON M.id_pabrik = P.id_pabrik ORDER BY M.no_VIN ASC');

    return view('admin.index', ['datas' => $datas]);
}

    public function descend()
{
    $datas = DB::select('SELECT M.no_VIN, M.model, M.tahun_produksi, M.warna, M.harga, P.id_pabrik, P.lokasi, P.inspektur FROM mobil M INNER JOIN pabrik P ON M.id_pabrik = P.id_pabrik ORDER BY M.no_VIN DESC');

    return view('admin.index', ['datas' => $datas]);
}
    
    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::table('mobil')->where('no_VIN', $id)->first();
        return view('admin.edit')->with('data', $data);
    }

    // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'no_VIN' => 'required',
            'model' => 'required',
            'tahun_produksi' => 'required',
            'warna' => 'required',
            'harga' => 'required',
            'id_pabrik' => 'required',
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
        UPDATE mobil 
        SET no_VIN = :new_no_VIN, 
            model = :new_model, 
            tahun_produksi = :new_tahun_produksi, 
            warna = :new_warna, 
            harga = :new_harga, 
            id_pabrik = :new_id_pabrik 
        WHERE no_VIN = :old_no_VIN;
    ", [
        'new_no_VIN' => $request->input('no_VIN'),
        'new_model' => $request->input('model'),
        'new_tahun_produksi' => $request->input('tahun_produksi'),
        'new_warna' => $request->input('warna'),
        'new_harga' => $request->input('harga'),
        'new_id_pabrik' => $request->input('id_pabrik'),
        'old_no_VIN' => $id,
    ]);

        return redirect()->route('admin.index')->with('success', 'Data berhasil diubah');
    }

    // public function to delete a row from a table
    public function delete($id)
    {
        DB::delete('DELETE FROM mobil WHERE no_VIN = :no_VIN', ['no_VIN' => $id]);
        return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus');
    }
}