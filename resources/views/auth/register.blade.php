@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome Completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                        value="{{ old('name') }}" required autocomplete="name" autofocus onkeyup="validateName()">


                                <div class="invalid-feedback" hidden id="invalidName">
                                    <strong>Informe o nome completo!</strong>
                                </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" 
                                        value="{{ old('phone') }}" required autocomplete="phone" maxlength="14" placeholder="(99)99999-9999">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_id" class="col-md-4 col-form-label text-md-right">Perfil</label>

                            <div class="col-md-6">
                                <select id="profile_id" name="profile_id" class="form-control  @error('profile_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>
                                        Selecione
                                    </option>
                                    @foreach($profiles as $profile)
                                        <option value="{{$profile->id}}" {{ (old("profile_id") == $profile->id ? "selected":"") }}>
                                            {{$profile->name}}
                                        </option>
                                    @endforeach
                                </select>

                                @error('profile_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sector_id" class="col-md-4 col-form-label text-md-right">Setor</label>

                            <div class="col-md-6">
                                <select id="sector_id" name="sector_id" class="form-control  @error('sector_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>
                                        Selecione
                                    </option>
                                    @foreach($sectors as $sector)
                                        <option value="{{$sector->id}}" {{ (old("sector_id") == $sector->id ? "selected":"") }}>
                                            {{$sector->name}}
                                        </option>
                                    @endforeach
                                </select>
                                
                                @error('sector_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submitRegister">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection