@extends('layouts.main')

@section('title', 'Pagina Inicial')

@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um produto</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="products-container" class="col-md-12">
        @if(count($produtos) == 0 && $search)
            <p>Não foram encontrados resultados para: "{{ $search }}"! <a href="/">Ver todos os produtos</a></p>
        @elseif(count($produtos) == 0)
            <p>Não há produtos cadastrados no site</p>
        @else
            @if($search)
                <h2>Resultados encontrados para: {{ $search }}</h2>
            @else
                <h2>Produtos mais procurados</h2>
                <p class="subtitle">Esses são os produtos mais vistos na última semana</p>
            @endif
            <div id="cards-container" class="row">
                @foreach($produtos as $produto)
                <div class="card col-md-3">
                    <img src="/img/{{$produto->imagem}}" alt="{{ $produto->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->titulo }}</h5>
                        <p class="card-participants">{{$produto->quantidade}} Disponiveis</p>
                        <a href="/produtos/{{$produto->id}}" class="btn btn-primary">Saber mais sobre {{ $produto->titulo }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection