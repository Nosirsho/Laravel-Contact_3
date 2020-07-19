


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
<article class="card-body">
<h4 class="card-title mb-4 mt-1">Вход</h4>
	 <form method="POST" action="{{ route('login') }}">
         @csrf
    <div class="form-group">

        <label for="email" >E-Mail</label>

        <div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div> <!-- form-group// -->


    <div class="form-group">
        <label for="password">Пароль</label>

        <div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="*********">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
            <div class="checkbox">

                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    Запомнить
                </label>
            </div>
    </div>

    <div class="form-group">

            <button type="submit" class="btn btn-primary btn-block">
                Войти
            </button>


    </div>


</form>
</article>
</div>
        </div>
    </div>
</div>
@endsection
