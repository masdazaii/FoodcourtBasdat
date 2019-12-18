<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use session;
use DB;
use URL;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function menuAjax($id)
    {
        $data = Menu::where('pedagang_id',$id)->get();
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('menu.destroy',$data->menu_id).'">
                                '.csrf_field().'
                                <a href="' .URL::to('/pedagang/'.$data->pedagang_id.'/menu/'.$data->menu_id.'/edit'). '" class="btn btn-sm btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
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
        //
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
            'pedagangId' => 'required',
            'namaMenu' => 'required',
            'harga' => 'required'
        ]);

        $menu = new Menu;
        $menu->pedagang_id = $request->pedagangId;
        $menu->nama_menu = $request->namaMenu;
        $menu->harga = $request->harga;
        $menu->save();

        return redirect()->route('menu',$request->pedagangId)->with('success','Menu berhasil ditambahkan');
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
    public function edit($menuId,$id)
    {
        $menu = Menu::findOrFail($id);
        // return $menu;
        return view('menu.edit',compact('menu'));
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
            'namaMenu' => 'required',
            'harga' => 'required'
        ]);

        $menu = Menu::findOrFail($id);
        $menu->nama_menu = $request->namaMenu;
        $menu->harga = $request->harga;
        $menu->save();

        return redirect()->route('menu',$menu->pedagang_id)->with('success','Menu berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu',$menu->pedagang_id)->with('success','Menu berhasil dihapus');
    }
}
