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

  <nav class="navbar py-2">
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
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis px-2" href="{{ route('login') }}">Вход</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis px-2" href="{{ route('register') }}">Регистрация</a>
                </li>
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

<script>
  document.addEventListener('DOMContentLoaded', function () {
      @if (session('success'))
          const successModal = new bootstrap.Modal(document.getElementById('successModal'));
          successModal.show();
      @endif
  });
</script>

<script src="{{ asset('js/changeCount.js') }}"></script>


</body>
</html>


