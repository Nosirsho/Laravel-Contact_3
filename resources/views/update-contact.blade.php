@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <a class="nav-link active" href="/contact_all">Все контакты</a>
                    </ul>
                </div>

                <div class="card-body">
                    <h3>Обновление</h3>
                    <form method="POST" action="{{ route('contact_update_submit', $data->id) }}">
                        @csrf
                        <div class="form-group row px-4">
                            <input id="name" value="{{$data->name}}" type="text" class="form-control" name="name"   placeholder="Имя">
                        </div>

                        <div class="form-group row px-4">
                            <input id="phone" value="{{$data->phone}}" type="text" class="form-control" name="phone"   placeholder="Телефон">
                        </div>

                        <div class="form-group row px-4">
                            <input id="group" value="{{$data->group}}" type="text" class="form-control" name="group"   placeholder="Группа">
                        </div>
                            <!-- Вывод сообщения errors или success -->
                            @include('auth.messages')

                        <div class="form-group row px-4">

                                <button type="submit" class="btn btn-primary">
                                    Обновить
                                </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
@endsection
