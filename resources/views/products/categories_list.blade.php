<nav class="navbar py-2">
        <div class="container d-flex flex-wrap">                
        <ul class="nav me-auto">
    @foreach($categories as $category)
        <li class="nav-item">
            <h5 class="mt-2 mb-2">            
            <a href="{{ $category->id }}" class="btn btn-bakery btn-lg mt-3">{{ $category->name }}</a>
            </h5>
        </li>
    @endforeach        
    </div>  
  </nav>  