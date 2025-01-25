@extends('layout.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">


            </div>
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <!-- User table !-->
                    <table class="table table-hover text-nowrap w-50">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ФИО</th>
                            <th>Эл.Почта</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="text-center"><a href="{{route('user.report', $user->id)}}">Составить отчёт</a></td>
                                <td class="text-center"><a href="{{route('user.change.time', $user->id)}}" class="text-green">Время посещения</a></td>
                                <td> <a href="{{route('user.edit', $user->id)}}" class="text-success">Изменить пользователя</a></td>
                                <td class="text-center">
                                    <form action="" method="post">
                                        {{csrf_field()}}
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent text-danger" >
                                            Удалить пользователя
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End user table!-->
                    <div class="col-sm-6">
                        <h3 class="m-0">Время посещения пользователя</h3>
                    </div>
                    <table class="table table-hover text-nowrap w-50">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Число</th>
                            <th>День</th>
                            <th>Время входа</th>
                            <th>Время выхода</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_time as $user_info_time)

                        <tr>
                            <td>{{$user_info_time->id}}</td>
                            <td>{{\Carbon\Carbon::parse($user_info_time->date)->translatedFormat('d F Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($user_info_time->date)->translatedFormat('l')}}</td>
                            <td>{{$user_info_time->enter_time}}</td>
                            <td>{{$user_info_time->out_time}}</td>
                            <td class="text-center">Составить отчёт</td>
                            <td class="text-center"><a href="{{route('user.change.exists.time', [$user->id, $user_info_time->id])}}" class="text-green">Изменить время</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection
