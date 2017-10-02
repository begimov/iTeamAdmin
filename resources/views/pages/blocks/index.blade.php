@foreach ($page->elements as $element)
  @include('pages.blocks.' . $element->block->view)
@endforeach
