<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use DB;
use session;
use URL;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.index');
    }

    public function pelangganAjax()
    {
        $data = Pelanggan::all();

        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('pelanggan.destroy',$data->pelanggan_id).'">
                                '.csrf_field().'
                                <a href="' .URL::to('/pelanggan/' . $data->pelanggan_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt mr-1"></i> Delete</button>
                            </form>';
                return $button;
            })
            ->removeColumn(['created_at','updated_at'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $this->validate($request,[
            'pelangganName' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required'
        ]);

        $pelanggan = new Pelanggan;
        $pelanggan->nama = $request->pelangganName;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_telp = $request->noTelp;
        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with('success','data pelanggan berhasil ditambahkan');
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
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit',compact('pelanggan'));
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
        $this->validate($request,[
            'pelangganName' => 'required',
            'alamat' => 'required',
            'noTelp' => 'required'
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->nama = $request->pelangganName;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_telp = $request->noTelp;
        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with('success','data pelanggan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success','data pelanggan berhasil dihapus');
    }
}
