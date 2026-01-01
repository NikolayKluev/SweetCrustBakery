@extends('layout')
@section('title', 'Личный кабинет')

@section('content')

{{-- <h1>
 @dd($cart) 
</h1> --}}

<div class="container py-5">
  <div class="row">
    <!-- Заголовок -->
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="font-family: 'Dancing Script', cursive; color: #8b4513;">
        Добро пожаловать, {{ auth()->user()->name }}!
      </h2>
      <p class="text-muted">Ваш личный кабинет в Sweet Crust Bakery</p>
    </div>

    <!-- Навигация -->
    <div class="col-md-4 mb-4">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
        <button class="nav-link active" id="v-pills-mydata-tab" data-bs-toggle="pill" data-bs-target="#mydata" type="button">
          Мои данные
        </button>
        <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#orders" type="button">
          Мои заказы
        </button>
        <button class="nav-link" id="v-pills-cart-tab" data-bs-toggle="pill" data-bs-target="#cart" type="button">
          Корзина
        </button>
      </div>
    </div>

    <!-- Контент -->
    <div class="col-md-8">
      <div class="tab-content" id="v-pills-tabContent">


        <!-- Раздел: Мои данные -->
         <div class="tab-pane fade show active" id="mydata">
          <h4 class="mb-4" style="color: #8b4513;">Мои данные</h4>    
          
          <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Фото — слева, без центрирования -->
                <div class="mb-4" style="max-width: 300px;">
                  <div class="position-relative d-inline-block">
                    @if(auth()->user()->profile_picture)
                      <img 
                        src="{{ asset('storage/avatars/' . auth()->user()->profile_picture) }}" 
                        alt="Аватар" 
                        class="rounded-circle" 
                        style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #8b4513;"
                      >
                    @else
                      <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                          style="width: 120px; height: 120px; border: 3px dashed #8b4513; color: #8b4513;">
                        <i class="bi bi-person-plus" style="font-size: 3rem;"></i>
                      </div>
                    @endif

                    <!-- Кнопка загрузки -->
                    <label for="avatar" class="btn btn-outline-secondary btn-sm d-block mt-2">
                      {{ auth()->user()->profile_picture ? 'Сменить фото' : 'Добавить фото' }}
                    </label>
                    <input 
                      type="file" 
                      name="avatar" 
                      id="avatar" 
                      class="d-none" 
                      accept="image/jpeg,image/png,image/webp"
                    >
                    <p class="text-muted small mt-1 mb-0">JPG, PNG, WEBP до 2 МБ</p>
                  </div>
                </div>

                <!-- Имя — слева -->
                <div class="mb-3" style="max-width: 400px;">
                  <label for="name" class="form-label">Имя</label>
                  <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name', auth()->user()->name) }}" 
                    required
                  >
                  @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Email — слева -->
                <div class="mb-3" style="max-width: 400px;">
                  <label for="email" class="form-label">Email</label>
                  <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email', auth()->user()->email) }}" 
                    required
                  >
                  @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3" style="max-width: 400px;">
                  <label for="email" class="form-label">Phone</label>
                  <input 
                    type="text" 
                    name="phone" 
                    id="phone" 
                    class="form-control @error('phone') is-invalid @enderror" 
                    value="{{ old('phone', auth()->user()->phone) }}" 
                    required
                  >
                  @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Кнопка — слева -->
                <div class="mb-4" style="max-width: 400px;">
                  <div class="d-grid d-sm-flex gap-2" style="max-width: 300px;">
                    <button type="submit" class="btn btn-bakery">
                      Сохранить изменения
                    </button>
                    {{-- <a href="{{ route('password.request') }}" class="btn btn-outline-secondary">
                      Сменить пароль
                    </a> --}}
                  </div>
                </div>
              </form>

              <!-- Ссылка (опционально) -->
              <p class="text-muted small">
                Ваши данные используются для оформления заказов.
              </p>

                                 
        </div>
        
        <!-- Раздел: Заказы -->
        <div class="tab-pane fade" id="orders">
          <h4 class="mb-4" style="color: #8b4513;">Мои заказы</h4>

          @if($orders->isEmpty())
            <div class="text-center py-4">
              <i class="bi bi-cart-x text-muted" style="font-size: 3rem;"></i>
              <p class="text-muted">У вас пока нет заказов.</p>
            </div>
          @else
            @foreach($orders as $order)
              <div class="card mb-3 shadow-sm border-0">
                <div class="card-body">
                  <p><strong>Заказ №{{ $order->id }}</strong></p>
                  <p>Дата: {{ $order->created_at->format('d.m.Y H:i') }}</p>
                  <p>Сумма: <strong>{{ $order->total_price }} ₽</strong></p>                  
                  <hr>
                  <h6>Товары:</h6>
                  <ul class="list-unstyled">
                    @foreach($order->items as $item)
                      <li>{{ $item->product->name }} × {{ $item['quantity'] }} = {{ $item['price'] * $item['quantity'] }} ₽</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            @endforeach
          @endif
        </div>

        <!-- Раздел: Корзина -->
        <div class="tab-pane fade" id="cart">
          <h4 class="mb-4" style="color: #8b4513;">Корзина</h4>

                @if(empty($cart) || !is_array($cart))
                  <div class="text-center py-4">
                    <i class="bi bi-basket text-muted" style="font-size: 3rem;"></i>
                    <p class="text-muted">Ваша корзина пуста.</p>
                    <div class="d-grid">              
                      <a href="/catalog/" class="btn btn-bakery">
                        Наполнить</a>
                    </div>
                  </div>
                @else
                  <div class="list-group mb-3">
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                      
                      @php 
                          $price = (float) $item['price'];
                          $quantity = (int) $item['quantity'];
                          $total += $price * $quantity;
                      @endphp

                      <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                          <h6>{{ $item['name'] }}</h6>
                          <small>{{ $item['quantity'] }} × {{ $item['price'] }} ₽</small>
                        </div>

                        <div class="d-flex align-items-center">
                            <!-- Стоимость позиции -->
                            <span class="me-3 fw-bold">
                                {{ number_format($price * $quantity, 2) }} ₽
                            </span>

                            <!-- Форма удаления -->
                            <div class="delete-wrapper">
                                <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-outline-danger delete-btn"
                                        onclick="return confirm('Удалить {{ e($item['name']) }} из корзины?');"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM8.5 1H7v1h1.5a.5.5 0 0 1 0 1H7v1h.5a.5.5 0 0 1 0 1H7v1h1.5a.5.5 0 0 1 0 1H7v1h1.5a.5.5 0 0 1 0 1H7v1a.5.5 0 0 1-.5.5H6a.5.5 0 0 1-.5-.5V2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>  
                        </div>

                      </div>                

                    @endforeach
                      

                      <div class="d-flex justify-content-between mb-3">
                        <strong>Итого:</strong>
                        <strong>{{ $total }} ₽</strong>
                      </div>

                      <div class="d-grid">              
                        <a href="{{ route('cart.checkout') }}" class="btn btn-bakery">
                          Оформить заказ</a>
                      </div>
                  </div>    
                @endif
            
      </div>
    </div>
  </div>
</div>

@endsection
