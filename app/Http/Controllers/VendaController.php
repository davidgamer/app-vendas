<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Produtos;
use App\Model\Clientes;
use App\Model\Venda;
use App\Model\ItemVenda;
use App\Model\Estoque;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clientes = Clientes::has('vendas')->with('vendas.itemVenda')->get();

        return view('vendas.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $produtos = Produtos::has('estoques')->with('estoques')->get();
        $clientes = Clientes::all();
        return view('vendas.create')->with(compact('produtos', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $venda = new Venda;
            $venda->total_venda = $request->total_venda;
            $venda->cliente_venda_id = $request->cliente_id;
            $venda->data_venda = $request->data_venda;
            $venda->save();
        foreach ($request->itens as  $value) {
            $itemVenda = new ItemVenda;
            $itemVenda->venda_item_venda_id = $venda->id;
            $itemVenda->produto_item_venda_id = $value["produtoId"];
            $itemVenda->save();
            $estoque = Estoque::where('produto_estoque_id', $value["produtoId"])->first();

            $estoque->quantidade_estoque = $estoque->quantidade_estoque - $value["quantidade"];
            $estoque->save();
       }



       return response()->json('Venda bem sucedida!');

        } catch (\Throwable $th) {
            $v = Venda::find($venda->id);
            $v->delete();
        }

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
}
