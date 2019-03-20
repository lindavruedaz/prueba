<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vendedor;

class vendedorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $vendedor=vendedor::orderBy('id','DESC')->paginate(3);
        return view('vendedor.index',compact('vendedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('vendedor.create');
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
          $this->validate($request,[ 'nombre'=>'required', 'direccion'=>'required', 'ci'=>'required', 'telf'=>'required']);
        vendedor::create($request->all());

        return redirect()->route('vendedor.index')->with('success','Registro creado satisfactoriamente');
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
        $vendedor=vendedor::find($id);
        return  view('vendedor.show',compact('vendedor'));
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
        $vendedor=vendedor::find($id);
        return view('vendedor.edit',compact('vendedor'));
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
        $this->validate($request,[ 'nombre'=>'required', 'direccion'=>'required', 'ci'=>'required', 'telf'=>'required']);
        vendedor::find($id)->update($request->all());
        return redirect()->route('vendedor.index')->with('success','Registro modificado satisfactoriamente');
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
        vendedor::find($id)->delete();
        return redirect()->route('vendedor.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
