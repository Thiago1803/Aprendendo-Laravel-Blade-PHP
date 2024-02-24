@extends('layouts.main')

@section('title', $produto->titulo)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/{{ $produto->imagem }}" class="img-fluid" alt="{{ $produto->titulo }}">
      </div>

      <div id="info-container" class="col-md-6">
        <h1>{{ $produto->titulo }}</h1>

        <p class="product-lancamento"><ion-icon name="calendar-outline"></ion-icon> {{ date('d/m/Y', strtotime($produto->lancamento)) }}</p>

        @if($produto->disponivel)
          <p class="product-quantidade"><ion-icon name="location-outline"></ion-icon> {{ $produto->quantidade }} disponiveis</p>
          <p class="product-owner"><ion-icon name="star-outline"></ion-icon> {{ $fornecedorProduto['name'] }} </p>
          <p class="product-owner"><ion-icon name="pricetag-outline"></ion-icon> R$</p>
          <p class="product-owner"><ion-icon name="people-outline"></ion-icon>{{ count($produto->users) }} Compras no total</p>
          <form action="/produtos/carrinho/{{ $produto->id }}" method="POST">
            @csrf
            <a href="/produtos/carrinho/{{ $produto->id }}" 
              class="btn btn-primary" 
              id="product-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Adicionar ao carrinho
            </a>
          </form>

          <h3>Formas de pagamento:</h3>
          @if($produto->pagamentos != null)
            <ul id="pagamentos-list">
              @foreach($produto->pagamentos as $pagamento)
                @if($pagamento == "Cartao")
                  <li><ion-icon name="card-outline"></ion-icon> <span>{{ $pagamento }}</span></li>
                @elseif($pagamento == "Pix")
                  <li><ion-icon name="cash-outline"></ion-icon> <span>{{ $pagamento }}</span></li>
                @elseif($pagamento == "Boleto")
                  <li><ion-icon name="barcode-outline"></ion-icon> <span>{{ $pagamento }}</span></li>
                @endif
              @endforeach
            </ul>
          @else
            <p> As formas de pagamento desse produto só podem ser consultadas ao finalizar a compra! </p>
          @endif
        @else
            <p> Este produto não se encontra disponível no estoque </p>
        @endif
      </div>

      <div class="col-md-12" id="description-container">
        <h3>Sobre o produto:</h3>
        <p class="product-description">{{ $produto->descricao }}</p>
      </div>
    </div>
  </div>

@endsection