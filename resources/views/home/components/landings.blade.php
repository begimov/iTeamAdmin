<div class="panel panel-danger">
  <div class="panel-heading"><a href="{{ route('landings.index') }}">Лендинги ></a></div>
  <div class="panel-body">
    @foreach ($landings as $landing)
      <li><a href="{{ route('landings.show', $landing->id) }}">{{ str_limit($landing->name, 20) }}</a></li>
    @endforeach
  </div>
  <div class="panel-footer">
    <a href="#" class="btn btn-primary btn-sm">Создать</a>
  </div>
</div>
