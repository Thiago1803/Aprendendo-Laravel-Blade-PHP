@extends('layouts.main')

@section('title', 'Meus produtos')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Produtos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-products-container">
        @if(count($produtosInseridos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtosInseridos as $produto)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/produtos/{{ $produto->id }}">{{ $produto->titulo }}</a></td>
                        <td>{{$produto->quantidade}}</td>
                        <td>
                            <a href="/produtos/edit/{{ $produto->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 

                            <form action="/produtos/{{ $produto->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
        @else
        <p>Você ainda não inseriu nenhum produto, <a href="/create">Inserir produto</a></p>
        @endif
    </div>
@endsection