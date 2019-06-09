<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Clientes;
use App\Model\Telefones;
use Illuminate\Support\Facades\Validator;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();
        return view('clientes.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
          'nome' => 'required|max:255',
          'cpf' => 'required|numeric',
          'cnpj' =>'required|numeric',
          'telefone'=>'required|max:255'
        ])->validate();
        $cliente = new Clientes;
        $cliente->nome =  $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->cnpj = $request->cnpj;
        $cliente->save();
        $telefone = new Telefones;
        $telefone->telefone = $request->telefone;
        $telefone->telefones_clientes_id = $cliente->id;
        $telefone->save();
        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Clientes::with('telefones','enderecos')->find($id);
        return view('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::with('telefones')->find($id)->first();
        return view('clientes.edit')->with('cliente', $cliente);
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
          'nome' => 'required|max:255',
          'cpf' => 'required|numeric',
          'cnpj' =>'required|numeric',

        ])->validate();
        $cliente =  Clientes::find($id);
        $cliente->nome =  $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->cnpj = $request->cnpj;
        $cliente->save();
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Clientes::find($id);
        $cliente->delete();
        return redirect('/clientes');
    }
}
