@extends('layouts.app')

@section('content')
<div class="container">
  @foreach ($page->elements as $element)
    @include('pages.page.blocks.' . $element->block->view)
  @endforeach
</div>
@endsection
