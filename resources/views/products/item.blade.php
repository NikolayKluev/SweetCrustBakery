<div class="card h-100 shadow-sm">
    <img src="{{ asset($product->image_url) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
    <div class="card-body">
           <h5 class="card-title">{{ $product->name }}</h5>
           <p class="text-muted">{{ $product->description }}</p>
           <p class="fw-bold text-primary">{{ $product->price }} ₽</p>


         <!-- Условие: кнопка только для авторизованных -->
      <div class="mt-3">
        @auth
          <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-bakery w-100">
              <i class="bi bi-cart-plus"></i> Добавить в корзину
            </button>
          </form>
        @else
          <a href="{{ route('login.form') }}" class="btn btn-outline-secondary w-100">
            <i class="bi bi-lock"></i> Войдите, чтобы заказать
          </a>
        @endauth
      </div>

    </div>
</div>