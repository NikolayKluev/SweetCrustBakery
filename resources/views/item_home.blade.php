<div class="col-md-4 mb-4">
    <div class="card h-100 cih shadow-sm border-0">
        <a href="{{ route('products.show', $prod->product->category_id) }}" class="stretched-link text-decoration-none" style="z-index: 1;"></a>
        <img src="{{ asset($prod->image_url) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $prod->product->name }}</h5>
            <p class="text-muted">{{ $prod->product->description }}</p>
            <p class="fw-bold text-primary">{{ $prod->product->price }} ₽</p>
        </div>
    </div>
</div>