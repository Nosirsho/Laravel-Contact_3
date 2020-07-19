@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li>
                            <a class="nav-link active" href="/home">Добавить контакт</a>
                        </li>
                        <li>
                            <a class="nav-link active ml-2" href="/contact_all">Все контакты</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                        <div class="alert alert-info">
                            <h3>{{ $data->name }}</h3>
                            <h5>Тел:  {{ $data->phone }}</h5>
                            <small>Группа:  {{ $data->group }}</small>
                            <div class="text-right">
                                <a href="{{ route('contact_update', $data->id) }}"><button class="btn btn-info">Редактировать</button></a>
                                <a href="{{ route('contact_delete', $data->id) }}"><button class="btn btn-danger">Удалить</button></a>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
