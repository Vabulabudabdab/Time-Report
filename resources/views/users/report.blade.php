@extends('layout.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Отчёт о пользователе</h1>
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
                            <th>Общее время пребывания</th>
                            <th>Среднее время пребывания</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{intdiv($minutes_diff/60, 1)}} Ч</td>
                            <td>{{intdiv($minutes_diff/60/$all_time->count(), 1)}} Ч</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
                <div class="card-body table-responsive p-0">
                    <!-- User table !-->
                    <h4 class="ml-2">Отчёт по времени пользователя</h4>
                    <table class="table table-hover text-nowrap w-50">
                        <thead>
                        <tr>
                            <th>Число</th>
                            <th>День</th>
                            <th>Время входа</th>
                            <th>Время выхода</th>
                            <th>Разница в часах</th>
                            <th>Разница в минутах</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dates as $time)
                            <tr>
                                <td>{{\Carbon\Carbon::parse($time->date)->translatedFormat('d F Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($time->date)->translatedFormat('l')}}</td>
                                <td>{{$time->enter_time}}</td>
                                <td>{{$time->out_time}}</td>
                                <td>{{mb_substr(preg_replace('/[^\d]/', ' ', Carbon\Carbon::parse($time->enter_time)->diffInHours(Carbon\Carbon::parse($time->out_time))), 0, 2)}}
                                    Ч
                                </td>
                                <td>{{mb_substr(preg_replace('/[^\d]/', ' ', Carbon\Carbon::parse($time->enter_time)->diffInMinutes(Carbon\Carbon::parse($time->out_time))), 0, 4)}}
                                    М
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="paginate_block mt-2 ml-2">
                        {{$dates->links()}}
                    </div>

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection
