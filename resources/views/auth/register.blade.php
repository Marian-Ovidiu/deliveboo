@extends('layouts.base')
@section('title', 'Registrati')

@section('content')
<section class="form-section">
  <div class="form-section-header">
    <div class="content">
      <div class="form-section-header-data">
        <div class="titles">
          Registrati
        </div>
        <div class="subtitles">
          Entra a far parte della nostra rete di ristoranti.
        </div>
      </div>
      <div class="form-section-header-img">
        <img src="{{asset ('img/00-register.jpg')}}" alt="Deliveroo">
      </div>
    </div>
  </div>

    <div class="container">
    <div class="row justify-content-center">
      {{-- Registration table --}}
      <div class="col-md-8">
          <div>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              {{-- row: firstname --}}
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                {{-- / row: firstname --}}

                {{-- row: lastname --}}
                <div class="form-group row">
                  <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>
                  <div class="col-md-6">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                      @error('last_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  {{-- / row: lastname --}}

                  {{-- row: date of birth --}}
                  <div class="form-group row">
                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Data di nascita') }}</label>
                    <div class="col-md-6">
                      <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>
                        @error('date_of_birth')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    {{-- / row: date of birth --}}

                    {{-- row: vat --}}
                    <div class="form-group row">
                      <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>
                      <div class="col-md-6">
                        <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required autocomplete="vat" autofocus>
                          @error('vat')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      {{-- / row: vat --}}

                      {{-- row: email --}}
                      <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                        <div class="col-md-6">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        {{-- / row: email --}}

                        {{-- row: password --}}
                        <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                          <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                              @error('password')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                          </div>
                          {{-- / row: password --}}

                          {{-- row: password confirm --}}
                          <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Ripeti Password') }}</label>
                            <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                          </div>
                          {{-- / row: password confirm --}}

                          {{-- row: submit --}}
                          <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                {{ __('Conferma registrazione') }}
                              </button>
                            </div>
                          </div>
                          {{-- / row: submit --}}
                        </form>
                      </div>
                    </div>
                  </div>
                  {{-- / Registration table --}}
              </div>
  </section>
@endsection
