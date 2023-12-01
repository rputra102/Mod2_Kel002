<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KasetController extends Controller
{
    public function create()
    {
        return view('kaset.add');
    }

    // public function store the value to a table
    public function store(Request $request)
    {
        $request->validate([
            'id_kaset' => 'required',
            'genre' => 'required',
            'band' => 'required',
        ]);

        DB::insert(
            'INSERT INTO kaset (id_kaset, genre, band, status) VALUES (:id_kaset, :genre, :band, :status)',
            [
                'id_kaset' => $request->id_kaset,
                'genre' => $request->genre,
                'band' => $request->band,
                'status' => 'AV'
            ]
        );
        return redirect()->route('kaset.index')->with('success', 'Data berhasil disimpan');
    }

    // public function show all values from a table
    public function index()
    {
        $datas = DB::select('SELECT * from kaset WHERE status = "AV"');
        return view('kaset.index')->with('datas', $datas);
        // $datas = DB::table('mobil')->orderBy('no_VIN', 'desc')->get();
    } 
    public function ascend()
{
    $datas = DB::select('SELECT * from kaset WHERE status = "AV" ORDER BY id_kaset ASC');

    return view('kaset.index', ['datas' => $datas]);
}

    public function descend()
{
    $datas = DB::select('SELECT * from kaset WHERE status = "AV" ORDER BY id_kaset DESC');

    return view('kaset.index', ['datas' => $datas]);
}
    
    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::table('kaset')->where('id_kaset', $id)->first();
        return view('kaset.edit')->with('data', $data);
    }

    // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'id_kaset' => 'required',
            'genre' => 'required',
            'band' => 'required',
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
        SET id_kaset = :new_id_kaset, 
            genre = :new_genre, 
            band = :new_band 
        WHERE id_kaset = :old_id_kaset;
    ", [
        'new_id_kaset' => $request->input('id_kaset'),
        'old_id_kaset' => $request->input('id_kaset'),
        'new_genre' => $request->input('genre'),
        'new_band' => $request->input('band'),
    ]);

        return redirect()->route('kaset.index')->with('success', 'Data berhasil diubah');
    }

    public function search(Request $request, $status)
    {
        $user = session('user');
        $kw = $request->input('key');
        $skw = '%'.(string)$kw.'%';
        $datas = DB::select(
            "
            SELECT * FROM kaset
            WHERE status = :status AND band LIKE :keyword ;",
            [
                'keyword' => $skw,
                'status' => $status
            ]
        );

        

        return view('kaset.index', ['user' => $user])->with('datas', $datas);
    }

    // public function to delete a row from a table
    public function delete($id)
    {
        DB::delete('DELETE FROM kaset WHERE id_kaset = :id_kaset', ['id_kaset' => $id]);
        return redirect()->route('kaset.index')->with('success', 'Data berhasil dihapus');
    }

    public function softDelete($id, Request $request)
    {
        DB::statement(" UPDATE kaset SET status = 'NAV' WHERE id_kaset = :id;", ['id' => $id]);

        return redirect()->route('kaset.index')->with('success', 'Data berhasil diubah');
    }

    public function restore($id, Request $request)
    {
        DB::statement(" UPDATE kaset SET status = 'AV' WHERE id_kaset = :id;", ['id' => $id]);

        return redirect()->route('admin.bin')->with('success', 'Data berhasil diubah');
    }


}