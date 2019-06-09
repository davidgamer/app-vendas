<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Produtos;
use App\Model\Estoque;
use Illuminate\Support\Facades\Validator;
class EstoqueController extends Controller
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
        $produtos = Produtos::all();
        return view('estoque.create')->with('produtos', $produtos);
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
          'quantidade_estoque'=>'required|numeric'
        ])->validate();
        $e = Estoque::where('produto_estoque_id', $request->produto_estoque_id)->first();
        if(!$e){
            $estoque = new Estoque;
            $estoque->quantidade_estoque = $request->quantidade_estoque;
            $estoque->produto_estoque_id = $request->produto_estoque_id;
            $estoque->save();
        }else{
            if($request->quantidade_estoque == 0){
                $e->quantidade_estoque = $request->quantidade_estoque;
            }
            if($request->quantidade_estoque != 0){
                $e->quantidade_estoque = $e->quantidade_estoque + $request->quantidade_estoque;
            }

            $e->save();
        }



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
