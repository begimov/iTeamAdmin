<?php // TODO: how to store and show pages / elements /blocks ?>
@if (isset($page))
<div class="row">
  <div class="panel panel-default">
    <div class="panel-body">
      <strong>MAIN.BLADE</strong>
        <p id="main_1">{{ getElementContentData($element, 'main_1') }}</p>
        <a id="main_2" href="{{ getElementContentData($element, 'main_2') }}">Link</a></p>
    </div>
  </div>
</div>
@else
  <div class="row">
    <div class="col-md-4 col-sm-4">
      <img-uploader v-model="path"></img-uploader>
    </div>
    <div class="col-md-4 col-sm-4">
      <h2>Название</h2>
      <input type="text" v-model="name" class="form-control">
    </div>
    <div class="col-md-4 col-sm-4">
      <h2>Ссылка</h2>
      <input type="text" v-model="link" class="form-control">
    </div>
  </div>
@endif
