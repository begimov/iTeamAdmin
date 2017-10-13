@extends('layouts.app')
<?php // TODO: how to store and show pages / elements /blocks ?>
@section('content')
<div class="container">
  @foreach ($page->elements as $element)
    @include('pages.page.blocks.' . $element->block->view)
  @endforeach
</div>
@endsection
