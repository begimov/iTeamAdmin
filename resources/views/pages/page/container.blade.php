@foreach ($page->elements as $element)
  @include('pages.page.blocks.' . $element->block->view)
@endforeach
