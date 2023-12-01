<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        $data = new \stdClass(); // Creating an empty object
        $data->tanggal_transaksi = now(); // Assigning the current timestamp or an appropriate default value

    return view('admin.add')->with('data', $data);
    }

    // public function store the value to a table
    public function store(Request $request)
    {
        $request->validate([
            'id_rental' => 'required',
            'id_pelanggan' => 'required',
            'id_kaset' => 'required',
            'id_staff' => 'required',
            'tanggal_transaksi' => 'required',
        ]);

        DB::insert(
            'INSERT INTO rental (id_rental, id_pelanggan, id_kaset, id_staff, tanggal_transaksi) VALUES (:id_rental, :id_pelanggan, :id_kaset, :id_staff, :tanggal_transaksi)',
            [
                'id_rental' => $request->id_rental,
                'id_pelanggan' => $request->id_pelanggan,
                'id_kaset' => $request->id_kaset,
                'id_staff' => $request->id_staff,
                'tanggal_transaksi' => $request->tanggal_transaksi,
            ]
        );
        return redirect()->route('admin.index')->with('success', 'Data berhasil disimpan');
    }

    // public function show all values from a table
    public function index()
    {
        $datas = DB::select('SELECT A.id_rental, A.tanggal_transaksi, M.id_pelanggan, M.nama_renter, P.id_kaset, P.genre, P.band, S.id_staff, S.nama_staff FROM rental A INNER JOIN pelanggan M ON A.id_pelanggan = M.id_pelanggan INNER JOIN kaset P ON A.id_kaset = P.id_kaset INNER JOIN staff S ON A.id_staff = S.id_staff ');
        return view('admin.index')->with('datas', $datas);
        // $datas = DB::table('mobil')->orderBy('no_VIN', 'desc')->get();
    } 

    public function bin()
    {
        $datas = DB::select('SELECT * FROM kaset WHERE status = "NAV"');
        return view('admin.bin')->with('datas', $datas);
        // $datas = DB::table('mobil')->orderBy('no_VIN', 'desc')->get();
    } 

    public function bindua()
    {
        $datas = DB::select('SELECT * FROM staff WHERE status = "NAV"');
        return view('admin.bindua')->with('datas', $datas);
        // $datas = DB::table('mobil')->orderBy('no_VIN', 'desc')->get();
    } 

    public function ascend()
{
    $datas = DB::select('SELECT A.id_rental, A.tanggal_transaksi, M.id_pelanggan, M.nama_renter, P.id_kaset, P.genre, P.band, S.id_staff, S.nama_staff FROM rental A INNER JOIN pelanggan M ON A.id_pelanggan = M.id_pelanggan INNER JOIN kaset P ON A.id_kaset = P.id_kaset INNER JOIN staff S ON A.id_staff = S.id_staff ORDER BY A.id_rental ASC');

    return view('admin.index', ['datas' => $datas]);
}

    public function descend()
{
    $datas = DB::select('SELECT A.id_rental, A.tanggal_transaksi, M.id_pelanggan, M.nama_renter, P.id_kaset, P.genre, P.band, S.id_staff, S.nama_staff FROM rental A INNER JOIN pelanggan M ON A.id_pelanggan = M.id_pelanggan INNER JOIN kaset P ON A.id_kaset = P.id_kaset INNER JOIN staff S ON A.id_staff = S.id_staff ORDER BY A.id_rental DESC');

    return view('admin.index', ['datas' => $datas]);
}
    
    // public function edit a row from a table
    public function edit($id)
    {
        $datas = DB::select('SELECT * FROM rental WHERE id_rental = :id', ['id' => $id]);
        $data = $datas[0];
        return view('admin.edit')->with('data', $data);
    }

    // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'id_rental' => 'required',
            'id_pelanggan' => 'required',
            'id_kaset' => 'required',
            'id_staff' => 'required',
            'tanggal_transaksi' => 'required',
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
        UPDATE rental 
        SET id_rental = :new_id_rental, 
            id_pelanggan = :new_id_pelanggan, 
            id_kaset = :new_id_kaset, 
            id_staff = :new_id_staff, 
            tanggal_transaksi = :new_tanggal_transaksi, 
        WHERE id_rental = :old_id_rental;
    ", [
        'new_id_rental' => $request->input('id_rental'),
        'new_id_pelanggan' => $request->input('id_pelanggan'),
        'new_id_kaset' => $request->input('id_kaset'),
        'new_id_staff' => $request->input('id_staff'),
        'new_tanggal_transaksi' => $request->input('tanggal_transaksi'),
    ]);

        return redirect()->route('admin.index')->with('success', 'Data berhasil diubah');
    }

    // public function to delete a row from a table
    public function delete($id)
    {
        DB::delete('DELETE FROM rental WHERE id_rental = :id_rental', ['id_rental' => $id]);
        return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus');
    }
}