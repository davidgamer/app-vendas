<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Enderecos;
use Illuminate\Support\Facades\Validator;
class EnderecoController extends Controller
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
        Validator::make($request->all(), [
          'cep' => 'required|max:255',
          'bairro' => 'required|max:255',
          'rua' =>'required|max:255',
          'numero'=>'required|numeric'
        ])->validate();
        $endereco = new Enderecos;
        $endereco->cep = $request->cep;
        $endereco->bairro = $request->bairro;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->cliente_enderecos_id = $request->cliente_enderecos_id;
        $endereco->save();
        return redirect('/clientes/'.$request->cliente_enderecos_id);    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('enderecos.create')->with('id', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco = Enderecos::find($id);
        return view('enderecos.edit')->with('endereco', $endereco);
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
        Validator::make($request->all(), [
          'cep' => 'required|max:255',
          'bairro' => 'required|max:255',
          'rua' =>'required|max:255',
          'numero'=>'required|numeric'
        ])->validate();

        $endereco = Enderecos::find($id);
        $endereco->cep = $request->cep;
        $endereco->bairro = $request->bairro;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $request->cliente_enderecos_id = $request->cliente_enderecos_id;
        $endereco->save();
        return redirect('/clientes/'.$request->cliente_enderecos_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco = Enderecos::find($id);
        $endereco->delete();
        return redirect()->back();
    }
}
