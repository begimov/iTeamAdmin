@extends('layouts.app')

@section('content')
  <orders :payment-types="{{ $paymentTypes }}"
  :payment-states="{{ $paymentStates }}"></orders>
@endsection
