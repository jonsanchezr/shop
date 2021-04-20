@foreach(Session::get('products') as $p)
  @foreach($productCart as $product)
    @if($p['id'] == $product->id)
    <div class="cart-item d-md-flex justify-content-between pr-2">
        <div class="px-3 my-3">
          <a class="cart-item-product" href="/products/{{$product->slug}}">
            <div class="cart-item-product-thumb"><img src="{{asset('assets/img/products/'.$product->slot_image_1)}}" alt="Product"></div>
            <div class="cart-item-product-info">
              <h4 class="cart-item-product-title">{{$product->title}}</h4>
              <span><strong>Categoria:</strong> {{$product->category->title}}</span>
                  <span><strong>Color:</strong> No Aplica</span>
            </div>
          </a>
        </div>
        <div class="px-3 my-3 text-center">
          <div class="cart-item-label">Quantity</div><span class="text-xl font-weight-medium">{{$p['unit']}}</span>
        </div>
        <div class="px-3 my-3 text-center">
          <div class="cart-item-label">Subtotal</div><span class="text-xl font-weight-medium">${{$product->amount}}</span>
        </div>
        <div class="px-3 my-3 text-center align-self-center"><a class="btn btn-secondary btn-sm" href="{{route('cart.index')}}">Edit</a></div>
    </div>
    @endif
  @endforeach
@endforeach