@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h1>{{ __('Add contact') }}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact_add') }}">
                        @csrf
                        <div class="form-group row px-4">
                            <input id="name" type="text" class="form-control" name="name"   placeholder="Name">
                        </div>

                        <div class="form-group row px-4">
                            <input id="phone" type="text" class="form-control" name="phone"   placeholder="Phone">
                        </div>

                        <div class="form-group row px-4">
                            <input id="group" type="text" class="form-control" name="group"   placeholder="Group">
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group row px-4">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add contact') }}
                                </button>

                        </div>
                    </form>


                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Контакты') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
