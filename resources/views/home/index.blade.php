@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    <div class="col-md-12">
      <orders :orders-prop="{{ $orders }}"></orders>
    </div>
  </div>

</div>
@endsection
