@extends('layouts.app')

@section('additional-css')
  <link rel="stylesheet" href="{{ asset('css/spinners.css') }}">
@endsection

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
