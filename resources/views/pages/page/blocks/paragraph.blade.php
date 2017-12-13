@if (isset($page))
<div class="row">
  <div class="col-md-12">
    <p class="lead">
      {{ getElementContentData($element, 'text') }}
    </p>
  </div>
</div>
@else
  <div class="row">
    <div class="col-md-12">
      <p>
        <textarea cols="30" rows="4" class="form-control" v-model="text"></textarea>
      </p>  
    </div>
  </div>
@endif
