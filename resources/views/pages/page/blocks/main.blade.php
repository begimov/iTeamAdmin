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
    <div class="panel panel-default">
      <div class="panel-body">
        <strong>MAIN.BLADE</strong>
          <p id="main_1"></p>
          <a id="main_2" href="">Link</a></p>
      </div>
    </div>
  </div>
@endif
