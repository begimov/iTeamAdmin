<div class="row">
  <div class="col">
    <p>
    <select v-model="data.productId">
      <option disabled value="">Выберите один из вариантов</option>
      {{ $products = App\Models\Products\Product::get() }}
      @foreach ($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
      @endforeach
    </select>
    </p>  
  </div>
</div>
