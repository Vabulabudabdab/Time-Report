@extends('layout.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование Пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование Пользователя</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <h5>Редактирование пользователя</h5>
                    <h5 class="text-danger">Все поля обязательные</h5>
                    <div class="form-group">
                        <form action="{{route('user.edit.post', $user->id)}}" method="post" class="w-25">
                            @method('patch')
                            {{csrf_field()}}
                            <label>Имя</label>
                            <input type="text" class="form-control" placeholder="Имя пользователя" name="name" value="{{$user->name}}">
                            <label>Почта</label>
                            <input type="email" class="form-control" placeholder="email" name="email" value="{{$user->email}}">
                            <label>Пароль</label>
                            <input type="password" class="form-control" placeholder="Пароль" name="password">
                            <input type="hidden" value="{{$user->id}}" name="user_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection
