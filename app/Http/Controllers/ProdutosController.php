<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Produtos;
use App\Model\Marca;
use App\Model\Estoque;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::with('estoques')->has('estoques')->get();

        return view('produtos.index')->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        return view('produtos.create')->with('marcas', $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produtos;
        $produto->produto_nome = $request->produto_nome;
        $produto->referencia = $request->referencia;
        $produto->descricao = $request->descricao;
        $produto->preco_venda = $request->preco_venda;
        $produto->marca_produto_id = $request->marca_produto_id;
        $produto->save();

        $estoque = new Estoque;
        $estoque->quantidade_estoque = $request->quantidade_estoque;
        $estoque->produto_estoque_id = $produto->id;
        $estoque->save();

        return redirect('/produtos');
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
         $marcas = Marca::all();
         $produto = Produtos::find($id);
        return view('produtos.edit')->with(compact('marcas', 'produto'));
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
        $produto = Produtos::find($id);
        $produto->produto_nome = $request->produto_nome;
        $produto->referencia = $request->referencia;
        $produto->descricao = $request->descricao;
        $produto->preco_venda = $request->preco_venda;
        $produto->marca_produto_id = $request->marca_produto_id;
        $produto->save();
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produtos::find($id);
        $produto->delete();
        return redirect('/produtos');
    }
}
