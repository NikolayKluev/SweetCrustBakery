@extends('layout')

@section('title', 'Главная')

@section('content')
	<div class="row align-items-center">
      <!-- Текст слева -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <h1 class="hero-title display-4 fw-bold">Добро пожаловать в <span class="text-bakery">Sweet Crust Bakery</span></h1>
        <p class="hero-text fs-5 text-muted">
          Мы печём с любовью, используя только свежие ингредиенты и традиционные рецепты. 
          Каждый кусочек — это маленькое сладкое счастье.
        </p>
        <a href="/catalog/" class="btn btn-bakery btn-lg mt-3">Наше меню</a>
      </div>

      <!-- Изображение справа -->
      <div class="col-lg-6">
        <img 
          src="{{ asset('images/bakery-hero.jpg') }}" 
          alt="Свежая выпечка в Sweet Crust Bakery" 
          class="img-fluid rounded shadow-lg"
        >
      </div>
    </div>

    <div class="container f mt-5">
        <h2 class="display-6 fw-bold" >
            Популярные товары
        </h2>
            <div id="productCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner mt-5">                    
                    <!-- Слайд 1 -->                                 
                    <div class="carousel-item active">
                    <div class="row justify-content-center">
                        @foreach ($arr_pop[0] as $prod)
                          @include('item_home')
                        @endforeach
                    </div>
                    </div>

                    <!-- Слайд 2 -->
                    <div class="carousel-item">
                    <div class="row justify-content-center">
                        @foreach ($arr_pop[1] as $prod)
                          @include('item_home')
                        @endforeach
                    </div>
                    </div>
                    
                </div>

                <!-- Управление: стрелки -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>

                <!-- Индикаторы (точки) -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1"></button>
                </div>
            </div>
    </div>

    <div class="container f mt-5">
        <h2 class="display-6 fw-bold">
            Акции и сезонные предложения
        </h2>
          <div id="productCarousel1" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner mt-5">

                    <!-- Слайд 1 -->
                    <div class="carousel-item active">
                      <div class="row g-0">
                        <!-- Изображение слева -->
                        <div class="col-md-6">
                          <img 
                            src="{{ asset('images/promo/summer-sale.jpg') }}" 
                            class="img-fluid h-100" 
                            style="object-fit: cover; height: 200px;"
                            alt="Летняя распродажа — 20% скидка"
                          >
                        </div>
                        <!-- Текст справа -->
                        <div class="col-md-6 d-flex align-items-center">
                          <div class="p-5 text-center text-md-start">
                            <h3 class="display-6 fw-bold" style="color: #8b4513;">
                              Летняя распродажа!
                            </h3>
                            <p class="lead text-muted mb-4">
                              Скидка <strong>20%</strong> на все торты в июле. Воспользуйтесь выгодным предложением!
                            </p>                            
                          </div>
                        </div>
                      </div>
                    </div>


                    <!-- Слайд 2: Сезонное предложение -->
                    <div class="carousel-item">
                      <div class="row g-0">
                        <!-- Изображение слева -->
                        <div class="col-md-6 d-flex align-items-center">
                          <div class="p-5 text-center text-md-start">
                            <h3 class="display-6 fw-bold" style="color: #8b4513;">
                              Сезонные пироги
                            </h3>
                            <p class="lead text-muted mb-4">
                              Только летом — пироги с малиной, ежевикой и смородиной. Свежесть с грядки!
                            </p>                            
                          </div>
                        </div>                        
                        
                        <div class="col-md-6">
                          <img 
                            src="{{ asset('images/promo/season-pies.jpg') }}" 
                            class="img-fluid h-100 gallery-image" 
                            style="object-fit: cover; height: 200px;"
                            alt="Сезонные пироги с ягодами"
                          >
                        </div>
                        <!-- Текст справа -->
                        
                      </div>
                    </div>

                </div>

                <!-- Управление: стрелки -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel1" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel1" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>

                <!-- Индикаторы (точки) -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#productCarousel1" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#productCarousel1" data-bs-slide-to="1"></button>
                </div>
            </div>
    </div>



  <div class="container f mt-5">
    
    <!-- Заголовок -->
    <div class="text-center mb-5">
      <h2 class="display-6 fw-bold">
        Наша Выпечка
      </h2>
      <p class="text-muted">Каждое изделие — с любовью и заботой</p>
    </div>

    <!-- Сетка изображений -->
    <div class="row g-3">
      <!-- Картинка 1 -->
      @foreach ($prod_ran as $pr)
        <div class="col-12 col-sm-6 col-md-4">
            <img 
              src="{{ $pr->image_url }}" 
              class="img-fluid rounded-3 gallery-image" 
              style="height: 250px; width: 450px; object-fit: cover; cursor: pointer;"
              data-bs-toggle="modal" 
              data-bs-target="#imageModal"
              data-img="{{ $pr->image_url }}"
              data-caption="{{ $pr->name }}"
            >
        </div>  
      @endforeach      
    </div>
  </div>

  <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0 shadow-lg">
        <div class="modal-body p-0 position-relative">
          <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          
          <!-- Большое изображение -->
          <img id="modalImage" class="img-fluid rounded-3 w-100" src="" alt="Увеличенное фото">

          <!-- Подпись -->
          <div class="text-center mt-3">
            <p class="text-muted mb-0" id="modalCaption"></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // При открытии модального окна подставляем изображение и подпись
    const imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget; // Картинка, по которой кликнули
      const imgSrc = button.getAttribute('data-img');
      const caption = button.getAttribute('data-caption');

      const modalImage = document.getElementById('modalImage');
      const modalCaption = document.getElementById('modalCaption');

      modalImage.src = imgSrc;
      modalCaption.textContent = caption;
    });
  </script>


@endsection