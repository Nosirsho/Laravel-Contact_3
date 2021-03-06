@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills">
                            <li class="mr-2">
                                <a class="nav-link active" href="/contact_all">Все контакты</a>
                            </li>
                            <li>
                                <a class="nav-link active" href="/contact_all/group">Мои группы</a>
                            </li>
                    </ul>
                </div>


                <div class="card-body">
                    <h3>Добавить контакт</h3>
                    <form method="POST" action="{{ route('contact_add') }}">
                        @csrf
                        <div class="form-group row px-4">
                            <input id="name" type="text" class="form-control" name="name"   placeholder="Имя">
                        </div>

                        <div class="form-group row px-4">
                            <input id="phone" type="text" class="form-control" name="phone"   placeholder="Телефон">
                        </div>

                        <div class="form-group row px-4">
                            <input id="group" type="text" class="form-control" name="group"   placeholder="Группа">
                        </div>
                            <!-- Вывод сообщения errors или success -->
                            @include('auth.messages')

                        <div class="form-group row px-4">

                                <button type="submit" class="btn btn-primary">Добавить</button>

                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
@endsection
