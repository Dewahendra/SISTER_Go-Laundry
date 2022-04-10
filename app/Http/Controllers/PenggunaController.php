<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna=Pengguna::paginate(5);
        $title="Data Pengguna";
        return view('pengguna', compact('title', 'pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Tambah Data";
        return view('tambahdata_pengguna', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=> 'Kolom :Attribute Harus Diisi',
        ];
        $validasi=$request->validate([
            'Nama'=>'required',
            'Alamat'=>'required',
            'No_Telepon'=>'required',
            'Email'=>'required',
            'Password'=>'required'
        ],$message);

        Pengguna::create($validasi);
        return redirect('pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna=Pengguna::find($id);
        $title="Edit Data";
        return view('tambahdata_pengguna', compact('title', 'pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
            'required'=> 'Kolom :Attribute Harus Diisi',
        ];
        $validasi=$request->validate([
            'Nama'=>'required',
            'Alamat'=>'required',
            'No_Telepon'=>'required',
            'Email'=>'required',
            'Password'=>'required'
        ],$message);

        Pengguna::where('id',$id)->update($validasi);
        return redirect('pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengguna::where('id',$id)->delete();
        return redirect('pengguna');
    }
}
