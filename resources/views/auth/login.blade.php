@extends('layout')
@section('title', 'Вход')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-5">
          <h2 class="text-center mb-4" style="font-family: 'Dancing Script', cursive; color: #8b4513; font-size: 2.5rem;">
            Вход
          </h2>

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Пароль</label>
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" name="remember" class="form-check-input" id="remember">
              <label class="form-check-label" for="remember">Запомнить меня</label>
            </div>

            <button type="submit" class="btn btn-bakery w-100">Войти</button>
          </form>

          <div class="text-center mt-4">
            <p>Нет аккаунта? <a href="{{ route('register.form') }}" style="color: #8b4513;">Зарегистрироваться</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
