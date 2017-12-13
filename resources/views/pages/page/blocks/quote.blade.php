<?php // TODO: how to store and show pages / elements /blocks ?>
@if (isset($page))
<div class="row">
  <div class="col-md-12">
    <blockquote>
      {{ getElementContentData($element, 'quote') }}
    </blockquote>
  </div>
</div>
@else
  <div class="row">
    <div class="col-md-12">
      <blockquote>
        <textarea cols="30" rows="4" class="form-control" v-model="quote"></textarea>
      </blockquote>  
    </div>
  </div>
@endif
