@extends('layouts.base')
@section('title', 'Pagamento rifiutato')

@section('content')
<div class="row-jumbotron">
    <div class="row content">
      <div class="card border-dark mb-3" style="width: 100%;">
          <div class="card-body text-dark"style="text-align: center;" >
              <h5 class="card-title">Pagamento rifiutato!</h5>
              <p class="card-text">Torna alla pagina precedente, verifica i dati inseriti e riprova.</p>
          </div>
          <a href="{{ route('cart-checkout') }}" class="btn btn-danger">Torna indietro</a>
      </div>
    </div>
</div>  
@endsection
