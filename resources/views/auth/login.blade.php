@extends('include.main')

@section('content')

    <form action="{{route('login.post')}}" class="auth-form" method="post">
        @csrf
        <div class="form-group">
            <h3>Вход</h3>
        </div>

        <div class="form-group">
            @error('email')
            <div class="text-danger" style="font-size: 14px">{{$message}}</div>
            @enderror

        </div>

        <div class="form-group">
            <input type="text" placeholder="Эл.почта" class="form-control" name="email">
            <div class="answer_auth">Эл.почта, указанная при регистрации</div>
        </div>

        <div class="form-group">
            <input type="password" placeholder="Пароль" class="form-control" name="password">
            <div class="answer_auth">Ваш пароль <span style="float: right">Нет аккаунта? <a href="{{route('register.get')}}">Зарегистрироваться</a></span></div>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Войти</button>
        </div>

    </form>

@endsection
