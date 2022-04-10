<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko=Toko::paginate(5);
        $title="Data Pemilik Toko";
        return view('toko', compact('title', 'toko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Tambah Data";
        return view('tambahdata_toko', compact('title'));
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
            'Nama_Toko'=>'required',
            'Email'=>'required',
            'Password'=>'required',
            'Cover'=>'required'
        ],$message);
        $path = $request->file('cover')->store('covers');
        $validasi['cover']=$path;
        Toko::create($validasi);
        return redirect('toko');
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
        $toko=Toko::find($id);
        $title="Edit Data";
        return view('tambahdata_toko', compact('title', 'toko'));
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
            'Nama_Toko'=>'required',
            'Email'=>'required',
            'Password'=>'required'
        ],$message);

        Toko::where('id',$id)->update($validasi);
        return redirect('toko');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Toko::where('id',$id)->delete();
        return redirect('toko');
    }
}
