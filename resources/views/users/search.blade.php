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
                        <li class="breadcrumb-item active"><a href="{{route('index')}}">Главная</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <form action="{{route('user.search')}}" method="post">
        {{csrf_field()}}
        <input type="text" class="form-control w-25 ml-2" name="user_name" placeholder="Поиск пользователей по ФИО">
    </form>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">


            </div>
            <div class="row">
                <div class="card-body table-responsive p-0">
                        @if(!empty($users) && $users->count() >= 1)
                        <table class="table table-hover text-nowrap w-50">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>ФИО</th>
                                <th>Эл.Почта</th>
                                <th>Составление отчёта</th>
                                <th>Зафиксировать время посещения</th>
                                <th>Изменение пользователя</th>
                                <th>Удаление пользователя</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td><a href="{{route('user.show', $user->id)}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td class="text-center"><a href="{{route('user.report', $user->id)}}">Составить отчёт</a></td>
                                <td class="text-center"><a href="{{route('user.change.time', $user->id)}}" class="text-green">Время посещения</a></td>
                                <td class="text-center">
                                    <a href="{{route('user.edit', $user->id)}}" class="text-success">Изменить пользователя</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{route('user.delete', $user->id)}}" method="post">
                                        {{csrf_field()}}
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent text-danger" >
                                            Удалить пользователя
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            Пользователь не найден
                        @endif
                            </tbody>
                        </table>
                        <div class="paginate_block mt-2 ml-2">
                            {{$users->links()}}
                        </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection
