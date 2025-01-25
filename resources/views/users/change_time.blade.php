@extends('layout.main')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Фиксирование времени пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Главная</a></li>
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
                    <h5>{{$user->name}} | {{$user->email}} | ID - {{$user->id}}</h5>
                    <div class="form-group">
                        <div class="text-danger">{{session('error_change_time')}}</div>
                        <form action="{{route('user.change.time.post', $user->id)}}" method="post" class="w-25">
                            {{csrf_field()}}
                            <label>Дата</label>
                            <div class="form-group"><input type="date" class="form-control"  name="date" value=""></div>
                            <label>Время входа</label>
                            <div class="form-group"><input type="time" class="form-control"  name="enter_time" value=""></div>
                            <label>Время выхода</label>
                            <div class="form-group"><input type="time" class="form-control"  name="out_time" value=""></div>

                            <div class="form-group"><button type="submit" class="btn btn-primary">Сохранить</button></div>

                        </form>
                    </div>

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
