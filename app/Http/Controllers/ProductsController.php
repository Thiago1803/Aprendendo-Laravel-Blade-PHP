<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductsController extends Controller
{
    public function index(){
        $search = request('search');
    
        if($search){
            $produtos = Product::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();
        }
        else{
            $produtos = Product::all();
        }
                
        return view('welcome',['produtos' => $produtos, 'search' => $search]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request) {
        $produto = new Product;

        $produto->titulo = $request->titulo;
        $produto->quantidade = $request->quantidade;
        $produto->disponivel = $request->disponivel;
        $produto->descricao = $request->descricao;
        $produto->pagamentos = $request->pagamentos;
        $produto->lancamento = $request->lancamento;

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $requestImagem->move(public_path('img'), $nomeImagem);
            $produto->imagem = $nomeImagem;
        }

        $user = auth()->user();
        $produto->user_id = $user->id;
        
        $produto->save();

        return redirect('/')->with('MsgSucesso', 'Produto inserido com sucesso!');
    }

    public function show($id){
        $produto = Product::findOrFail($id);

        $fornecedorProduto = User::where('id', $produto->user_id)->first()->toArray();

        return view('show', ['produto' => $produto, 'fornecedorProduto' => $fornecedorProduto]);
    }

    public function dashboard() {
        $user = auth()->user();

        $produtosInseridos = $user->products;

        return view('dashboard', ['produtosInseridos' => $produtosInseridos]);
    }

    public function destroy($id){
        Product::findOrFail($id)->delete();

        return redirect('/dashboard')->with('MsgSucesso', 'Produto removido com sucesso!');
    }

    public function edit($id) {
        $produto = Product::findOrFail($id);

        return view('edit', ['produto' => $produto]);
    }

    public function update(Request $request) {
        $data = $request->all();

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $requestImagem->move(public_path('img'), $nomeImagem);
            $data['imagem'] = $nomeImagem;
        }

        Product::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('MsgSucesso', 'Produto editado com sucesso!');
    }
}