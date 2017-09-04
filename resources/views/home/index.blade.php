@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    <div class="col-md-12">
      <orders :payment-types="{{ $paymentTypes }}"
        :payment-states="{{ $paymentStates }}"></orders>
    </div>
  </div>

</div>
@endsection
