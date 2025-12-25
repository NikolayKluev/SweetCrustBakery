@extends('layout')

@section('title', 'Каталог')

@section('content')
    <div class="container py-5">
  <h2 class="text-center" style="font-family: 'Dancing Script', cursive; color: #8b4513;">
    Наши продукты
  </h2>

  <!-- Вывод по категориям -->

  @include('products.categories_list')

  @foreach($categories as $category)
    
    <h3 class="mt-5 mb-4" style="color: #8b4513;">
         {{ $category->name }} 
    </h3>

    <div class="row g-4">
      @forelse($category->products as $product)
        <div class="col-md-4">
          @include('products.item')
        </div>
      @empty
        <p class="text-muted">Товары не найдены.</p>
      @endforelse
    </div>
  @endforeach
</div>
@endsection