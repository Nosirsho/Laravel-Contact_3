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
                            <a class="nav-link active ml-3" href="/contact_all">Все контакты</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">

                    @foreach($data as $el)
                        <div class="alert alert-info">
                            <h3>Группа: <i>{{ $el->group }}</i></h3>
                            <h5>Контактов: {{ $el->amount }}</h3>
                            <div class="text-right">
                                <a href="/contact_all/group/{{$el->group}}"><button class="btn btn-info">Подробнее...</button></a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
