<div class="panel panel-danger">
  <div class="panel-heading"><a href="#">Лендинги ></a></div>
  <div class="panel-body">
    @foreach ($landings as $landing)
      <li>{{ str_limit($landing->name, 20) }}</li>
    @endforeach
  </div>
  <div class="panel-footer">
    <a href="#" class="btn btn-primary btn-sm">Создать</a>
  </div>
</div>
