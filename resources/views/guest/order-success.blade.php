@extends('layouts.base')
@section('title', 'Ordine confermato')

@section('content')
<div class="row-jumbotron">
    <div class="row content">
      <div class="card border-dark mb-3" style="width: 100%;">
          <div class="card-body text-dark"style="text-align: center;" >
              <h5 class="card-title">Pagamento avvenuto con successo!</h5>
              <p class="card-text">Ti abbiamo inviato una e-mail riepilogativa del tuo ordine.</p>
          </div>
          <a href="{{ route('public-home') }}" class="btn btn-primary">Torna alla Homepage</a>
      </div>
    </div>
</div>  
@endsection
