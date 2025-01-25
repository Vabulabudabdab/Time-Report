@extends('include.main')

@section('content')

    <form action="{{route('register.post')}}" class="auth-form" method="post">
        @csrf
        <div class="form-group">
            <h3>Регистрация</h3>
        </div>

        <div class="form-group">


        </div>

       <div class="form-group">
           <input type="text" placeholder="Введите ФИО"  class="form-control" name="name">
           @error('name')
           <div class="text-danger" style="font-size: 14px">{{$message}}</div>
           @enderror
           <div class="answer_auth">Введите ваше ФИО</div>
       </div>

        <div class="form-group">
            <input type="text" placeholder="Эл.почта" class="form-control" name="email">
            @error('email')
            <div class="text-danger" style="font-size: 14px">{{$message}}</div>
            @enderror
            <div class="answer_auth">Пример example@gmail.com</div>
        </div>

        <div class="form-group">
            <input type="password" placeholder="Пароль" class="form-control" name="password">
            @error('password')
            <div class="text-danger" style="font-size: 14px">{{$message}}</div>
            @enderror
            <div class="answer_auth">Придумайте надежный пароль</div>
        </div>

        <div class="form-group">
            <input type="password" placeholder="Пароль" class="form-control" name="password_confirmation">
            @error('password_confirmation')
            <div class="text-danger" style="font-size: 14px">{{$message}}</div>
            @enderror
            <div class="answer_auth">Подтвердите пароль <span style="float: right">Уже есть аккаунт? <a href="{{route('login.get')}}">Войти</a></span> </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </div>

    </form>

@endsection
