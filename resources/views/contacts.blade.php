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
                            <a class="nav-link active ml-3" href="/contact_all/group">Мои группы</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">

                    @foreach($data as $el)
                        <div class="alert alert-info">
                            <h3>{{ $el->name }}</h3>
                            <h5>Тел:  {{ $el->phone }}</h5>
                            <small>Группа:  {{ $el->group }}</small>
                            <div class="text-right">
                                <a href="{{ route('contact_one', $el->id) }}"><button class="btn btn-info">Подробнее...</button></a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
