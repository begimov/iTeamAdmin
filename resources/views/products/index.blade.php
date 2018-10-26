@extends('layouts.app')

@section('content')
  <products :categories="{{ $categories }}"></products>
@endsection
