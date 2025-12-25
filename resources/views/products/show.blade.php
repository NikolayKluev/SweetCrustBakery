@extends('layout')

@section('title', $category->name)

@section('content')

@include('products.categories_list')

    <div class="container py-5">
  <h2 class="text-center mb-4" style="font-family: 'Dancing Script', cursive; color: #8b4513;">
   {{ $category->name }}
  </h2>

  <!-- Вывод по категориям -->  
    
    @if(!($categories->pluck('products')->flatten()->isNotEmpty()))
        <div class="text-center py-5">
            <i class="bi bi-box-seam text-muted" style="font-size: 3.5rem;"></i>
            <h5 class="text-muted mt-3">Пока нет ни одного товара</h5>
            <p class="text-muted">Скоро появится вкусная выпечка — загляните позже!</p>
        </div>
    @else  
    <div class="row g-4">
      @foreach($category->products as $product)
       <div class="col-md-4">
          @include('products.item')
       </div>        
      @endforeach
    </div> 
    @endif
</div>
@endsection