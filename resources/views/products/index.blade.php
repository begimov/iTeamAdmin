@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    <div class="col-md-12">
      {{-- <products></products> --}}
      <router-view></router-view>
    </div>
  </div>

</div>
@endsection
