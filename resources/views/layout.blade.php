<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">  
<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | Sweet Crust Bakery</title>  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <script src="{{ asset('js/csrf.js') }}"></script>
    <script src="{{ asset('js/changeCount.js') }}"></script>    
    <script src="{{ asset('js/auth_reg.js') }}" defer></script>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
          @if (session('success'))
              const successModal = new bootstrap.Modal(document.getElementById('successModal'));
              successModal.show();
          @endif
      });
    </script>
  
</head>

<body> 

<!-- Модальное окно для success-сообщений -->
@if (session('success'))
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-body text-center py-4">
                    <i class="bi bi-check-circle text-success" style="font-size: 3rem;"></i>
                    <h5 class="mt-3" style="color: #8b4513;">Успешно!</h5>
                    <p class="text-muted mb-0">{{ session('success') }}</p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-bakery px-4" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Модальное окно -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-underline" id="authTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Вход</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Регистрация</button>
                    </li>
                </ul>
                <button type="button" class="btn-close btn-bakery" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="authTabContent">
                    <!-- Форма входа -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <form id="loginForm">
                            @csrf
                            <div class="mb-3">
                                <label for="login-email" class="form-label text-bakery">Email</label>
                                <input type="email" class="form-control" id="login-email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="login-password" class="form-label text-bakery">Пароль</label>
                                <input type="password" class="form-control" id="login-password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 btn-bakery">Войти</button>
                        </form>
                    </div>

                    <!-- Форма регистрации -->
                    <div class="tab-pane fade" id="register" role="tabpanel">
                        <form id="registerForm">
                            @csrf
                            <div class="mb-3">
                                <label for="register-name" class="form-label text-bakery">Имя</label>
                                <input type="text" class="form-control" id="register-name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="register-email" class="form-label text-bakery">Email</label>
                                <input type="email" class="form-control" id="register-email" name="email" required>
                            </div>
                            <div class="mb-3">
                                  <label for="phone" class="form-label text-bakery">Phone</label>
                                  <input type="text" name="phone" id="register-phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                                  @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                            </div>
                            <div class="mb-3">
                                <label for="register-password" class="form-label text-bakery">Пароль</label>
                                <input type="password" class="form-control" id="register-password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="register-password-confirm" class="form-label text-bakery">Подтвердите пароль</label>
                                <input type="password" class="form-control" id="register-password-confirm" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100 btn-bakery">Зарегистрироваться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  <nav class="navbar py-2" id="header">
    <div class="container d-flex flex-wrap">                
      <ul class="nav me-auto">
        <li class="nav-item">
          <a class="nav-link link-body-emphasis px-2" href="/">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-body-emphasis px-2" href="/catalog/">Каталог</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-body-emphasis px-2" href="/contacts/">Контакты</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link link-body-emphasis px-2" href="/reviews/">Отзывы</a>
        </li>        
      </ul>     
      
        <ul class="nav">
            @guest
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#authModal">
                    Войти / Регистрация
                </button>
            @else
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis px-2" href="{{ route('profile') }}">Привет, {{ Auth::user()->name }}!</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link link-body-emphasis px-2 btn btn-link" style="color: #8b4513;">Выход</button>
                    </form>
                </li>
            @endguest
        </ul>
    </div>  
  </nav>  


    
  <div class="container hero-section d-flex flex-wrap mt-2">
    @yield('content')
  </div>


  <div class="container f mt-5">
    <footer>
        <h1 class="text-center">Sweet Crust Bakery</h1> 
        <div class="row align-items-center">          
            <div class="col-lg-4">
              <ul>
                <li class="list-group-item">
                  <a class="nav-link link-body-emphasis" href="">Политика конфиденциальности</a>  
                </li>
                <li class="list-group-item">
                  <a class="nav-link link-body-emphasis" href="">Условия использования</a>  
                </li>          
              </ul>
            </div>          
            <div class="col-lg-4">
              <ul>
                <li class="list-group-item">
                  <a class="nav-link link-body-emphasis" href="">Блог</a>  
                </li>
                <li class="list-group-item">
                  <a class="nav-link link-body-emphasis" href="">Рецепты</a>  
                </li>   
                <li class="list-group-item">
                  <a class="nav-link link-body-emphasis" href="">Новости пекарни</a>  
                </li>       
              </ul>
            </div>
            <div class="col-lg-4">
              <ul>
                <li class="list-group-item">
                  <a class="nav-link link-body-emphasis" href="/contacts/">Контакты</a>  
                </li>
                <li class="list-group-item">
                  <a class="nav-link link-body-emphasis" href="/contacts/">Адрес</a>  
                </li>   
                <li class="list-group-item">
                  <a class="nav-link link-body-emphasis" href="/reviews/">Обратная связь</a>  
                </li>       
              </ul>
            </div>
        </div>
    </footer>
  </div> 

  <script src="{{ asset('js/stickyHeader.js') }}"></script>

</body>
</html>


