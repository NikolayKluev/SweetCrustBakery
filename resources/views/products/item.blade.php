<div class="card h-100 shadow-sm">
    <img src="{{ asset($product->image_url) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
    <div class="card-body">
           <h5 class="card-title">{{ $product->name }}</h5>
           <p class="text-muted">{{ $product->description }}</p>
           <p class="fw-bold text-primary">{{ $product->price }} ₽</p>

      <!-- Блок: количество + кнопки -->
      <!-- Условие: кнопка только для авторизованных -->
      <div class="mt-3">
        @auth
          <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

              <div class="d-flex align-items-center mb-2">
                <label for="quantity_{{ $product->id }}" class="me-2 small">Кол-во:</label>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="decreaseQuantity({{ $product->id }})">−</button>
                <input 
                    type="number" 
                    name="quantity" 
                    id="quantity_{{ $product->id }}" 
                    class="form-control form-control-sm text-center mx-1" 
                    value="{{ $cart[$product->id]['quantity'] ?? 1 }}" 
                    min="1" 
                    max="100" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" 
                    style="width: 60px;"
                    readonly
                >
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="increaseQuantity({{ $product->id }})">+</button>
              </div>
    
            <button type="submit" class="btn btn-bakery w-100">
              <i class="bi bi-cart-plus"></i> Добавить в корзину
            </button>
          </form>
        @else
          <a href="#" data-bs-toggle="modal" data-bs-target="#authModal" class="btn btn-outline-secondary w-100">
            <i class="bi bi-lock"></i> Войдите, чтобы заказать
          </a>
        @endauth
      </div>

    </div>
</div>


<script>
  function increaseQuantity(productId) {
      const input = document.getElementById('quantity_' + productId);
      let value = parseInt(input.value);
      const max = parseInt(input.max);

      if (value < 1) input.value = 1;
      if (value < max) {
        input.value = value + 1;
    }       
    if (value >= max) alert(`Максимум: ${max} шт.`);
  }

  function decreaseQuantity(productId) {
      const input = document.getElementById('quantity_' + productId);
      let value = parseInt(input.value);
      if (value > 1) {
          input.value = value - 1;
      }      
  }  
</script>