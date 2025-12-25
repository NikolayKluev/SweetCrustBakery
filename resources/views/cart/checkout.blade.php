@extends('layout')
@section('title', 'Оформление заказа')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <!-- Заголовок -->
      <h2 class="text-center mb-4" style="font-family: 'Dancing Script', cursive; color: #8b4513; font-size: 2.5rem;">
        Оформление заказа
      </h2>

      <!-- Сообщение об успехе -->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <!-- Проверка: пустая корзина -->
      @if(empty($cart))
        <div class="text-center py-4">
          <i class="bi bi-cart-x text-muted" style="font-size: 3rem;"></i>
          <p class="text-muted mt-3">Ваша корзина пуста.</p>
          <a href="{{ route('products.show') }}" class="btn btn-outline-secondary">Перейти к покупкам</a>
        </div>
      @else
        <!-- Форма создания заказа -->
        <form action="{{ route('order.create') }}" method="POST">
          @csrf

          <!-- Состав заказа -->
          <div class="card shadow-sm mb-4">
            <div class="card-body">
              <h5>Ваш заказ:</h5>
              <ul class="list-group list-group-flush mb-3">
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                  @php $total += $item['price'] * $item['quantity']; @endphp
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <strong>{{ $item['name'] }}</strong>
                      <br>
                      <small class="text-muted">Кол-во: {{ $item['quantity'] }}</small>
                    </div>
                    <span>{{ $item['price'] * $item['quantity'] }} ₽</span>
                  </li>
                @endforeach
              </ul>

              <div class="d-flex justify-content-between border-top pt-3">
                <strong>Итого:</strong>
                <strong>{{ $total }} ₽</strong>
              </div>
            </div>
          </div>

          <!-- Кнопка подтверждения -->
          <div class="d-grid">
            <button type="submit" class="btn btn-bakery btn-lg">
              <i class="bi bi-check-circle"></i> Подтвердить заказ
            </button>
          </div>
        </form>

        <!-- Ссылка "Назад" -->
        <div class="text-center mt-3">
          <a href="{{ route('profile') }}" class="text-muted">
            ← Вернуться в корзину
          </a>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
