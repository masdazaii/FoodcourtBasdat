<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedagang;
use session;
use DB;
use URL;

class PedagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pedagang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pedagangAjax()
    {
        $data = Pedagang::all();

        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('pedagang.destroy',$data->pedagang_id).'">
                                '.csrf_field().'
                                <a href="'.URL::to('/pedagang/'.$data->pedagang_id.'/menu').'" class="btn btn-sm btn-success"><i class="fas fa-edit mr-1"></i>Menu</a>
                                <a href="' .URL::to('/pedagang/' . $data->pedagang_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt mr-1"></i> Delete</button>
                            </form>';
                return $button;
            })
            ->removeColumn(['created_at','updated_at'])
            ->make(true);
    }

    public function create()
    {
        return view('pedagang.create');
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
            'pedagangName' => 'required',
            'outletName' => 'required',
            'noTelp' => 'required'
        ]);

        $pedagang = new Pedagang;
        $pedagang->nama_pedagang = $request->pedagangName;
        $pedagang->outlet = $request->outletName;
        $pedagang->no_telp = $request->noTelp;
        $pedagang->save();

        return redirect()->route('pedagang.index')->with('success','data pedagang berhasil ditambahkan');
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
        $pedagang = Pedagang::where('pedagang_id',$id)->first();
        // return $pedagang;
        return view('pedagang.edit',compact('pedagang'));
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
            'pedagangName' => 'required',
            'outletName' => 'required',
            'noTelp' => 'required'
        ]);

        $pedagang = Pedagang::findOrFail($id);
        $pedagang->nama_pedagang = $request->pedagangName;
        $pedagang->outlet = $request->outletName;
        $pedagang->no_telp = $request->noTelp;
        $pedagang->save();

        return redirect()->route('pedagang.index')->with('success','data pedagang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedagang = Pedagang::findOrFail($id);
        $pedagang->delete();
        return redirect()->route('pedagang.index')->with('success','data pedagang berhasil dihapus');
    }

    public function menu($id)
    {
        $pedagang = Pedagang::findOrFail($id);
        return view('menu.index',compact('pedagang'));      
    }
}
