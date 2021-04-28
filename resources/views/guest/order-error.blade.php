@extends('layouts.base')
@section('title', 'Pagamento rifiutato')

@section('content')
dd($errors);
<div class="row-jumbotron">
    <div class="row content">
      <div class="card border-dark mb-3" style="width: 100%; text-align: center;">
        <div class="card-header">
            <i class="fas fa-check-times" style="color: red; font-size: 80px;"></i>
          </div>
          <div class="card-body text-dark" >
              <h5 class="card-title">Pagamento rifiutato!</h5>
              <p class="card-text">Torna alla pagina precedente, verifica i dati inseriti e riprova.</p>
          </div>
          <a href="{{ route('cart-checkout') }}" class="btn btn-danger">Torna indietro</a>
      </div>
    </div>
</div>
@endsection
