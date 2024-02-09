@extends('layouts.main')

@section('title', 'Inserir Produto')

@section('content')
    <div id="product-create-container" class="col-md-6 offset-md-3">
    <h1>Insira um novo produto</h1>
    <form action="/produtos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Produto:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do produto">
        </div>
        <div class="form-group">
            <label for="date">Data de lançamento:</label>
            <input type="date" class="form-control" id="lancamento" name="lancamento">
        </div>
        <div class="form-group">
            <label for="title">Quantidade:</label>
            <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade disponível">
        </div>
        <div class="form-group">
            <label for="title">Está no estoque?</label>
            <select name="disponivel" id="disponivel" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Insira detalhes do produto"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Imagem do Produto:</label>
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

        <input type="submit" class="btn btn-primary" value="Salvar Produto">
    </form>
    </div>
@endsection