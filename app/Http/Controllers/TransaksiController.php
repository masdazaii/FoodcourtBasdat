<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use session;
use DB;
use App\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index');
    }

    public function transaksiAjax()
    {
        $data = Transaksi::with(['menu' => function($query){
                    $query->with('pedagang');
                },'pelanggan'])
                ->get();
        // return $data;

        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('transaksi.destroy',$data->transaksi_id).'">
                                '.csrf_field().'
                                <a href="' .URL::to('/transaksi/' . $data->transaksi_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt mr-1"></i> Delete</button>
                            </form>';
                return $button;
            })
            ->editColumn('pelanggan_id',function($data){
                return $data->pelanggan->nama;
            })
            ->editColumn('menu_id',function($data){
                return $data->menu->nama_menu;
            })
            ->addColumn('outlet',function($data){
                return $data->menu->pedagang->outlet;
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
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function generateHarga()
    // {
    //     for ($i=4933; $i < 5000 ; $i++) { 
    //         $transaksi = Transaksi::findOrFail($i);
    //         $transaksi->total_harga = $transaksi->jumlah * $transaksi->menu->harga;
    //         $transaksi->save();
    //     }

    //     return redirect()->back();
    // }
}
