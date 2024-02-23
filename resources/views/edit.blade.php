@extends('layouts.main')

@section('title', 'Editando: ' . $produto->titulo)

@section('content')
    <div id="product-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $produto->titulo }}</h1>
        <form action="/produtos/update/{{ $produto->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Produto:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do produto" value="{{ $produto->titulo }}">
            </div>
            <div class="form-group">
                <label for="date">Data de lançamento:</label>
                <input type="date" class="form-control" id="lancamento" name="lancamento" value="{{date('Y-m-d', strtotime($produto->lancamento)) }}">
            </div>
            <div class="form-group">
                <label for="title">Quantidade:</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade disponível" value="{{ $produto->quantidade }}">
            </div>
            <div class="form-group">
                <label for="title">Está no estoque?</label>
                <select name="disponivel" id="disponivel" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{$produto->disponivel == 1 ? "selected='selected'" : ""}}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="Insira detalhes do produto">{{ $produto->descricao }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagem do Produto:</label>
                <img src="/img/{{ $produto->imagem }}" alt="{{ $produto->titulo }}" class="img-preview">
                <input type="file" id="imagem" name="imagem" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="title">Formas de pagamento:</label>
                <div class="form-group">	
                    <input type="checkbox" name="pagamentos[]" value="Cartao"> Cartão
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="pagamentos[]" value="Pix"> Pix
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="pagamentos[]" value="Boleto"> Boleto
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Editar Produto">
        </form>
    </div>
@endsection