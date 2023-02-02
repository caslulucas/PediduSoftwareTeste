<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Redirect;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::get();
        return view('produtos.list', ['produtos' => $produtos]);
    }

    public function new(){
        return view('produtos.form ');
    }

    public function add( Request $request){
        $produtos = new Produto;
        $produtos = $produtos->create( $request->all() );
        return Redirect::to('/produtos');
    }

    public function edit( $id ){
        $produtos = Produto::findOrFail( $id );
        return view('produtos.form', ['produto' => $produtos]);
    }

    public function update( $id, Request $request){
        $produtos = Produto::findOrFail( $id );
        $produtos->update( $request->all() );
        return Redirect::to('/produtos');
    }

    public function delete( $id ){
        $produtos = Produto::findOrFail( $id );
        $produtos->delete();
        return Redirect::to('/produtos');
    }
}
