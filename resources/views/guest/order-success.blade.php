@extends('layouts.base')
@section('title', 'Ordine confermato')

@section('content')
<div class="row-jumbotron">
    <div class="row content">
      <div class="card border-dark mb-3" style="width: 100%; text-align: center;">
          <div class="card-header">
            <i class="fas fa-check-circle" style="color: green; font-size: 80px;"></i>
          </div>
          <div class="card-body text-dark" >
              <h5 class="card-title">Pagamento avvenuto con successo!</h5>
              <p class="card-text">Ti abbiamo inviato una e-mail riepilogativa del tuo ordine.</p>
          </div>
          <a href="{{ route('public-home') }}" class="btn btn-primary">Torna alla Homepage</a>
      </div>
    </div>
</div>
@endsection
