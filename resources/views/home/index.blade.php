@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-8">
      <div class="panel panel-danger">
        <div class="panel-heading"><a href="#">Заказы</a></div>
        <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Номер</th>
                <th>Пользователь</th>
                <th>Email</th>
                <th>Сумма</th>
              </tr>
            </thead>
            <tbody>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading"><a href="#">Лендинги ></a></div>
        <div class="panel-body">
          <li>Название лендинга 1</li>
          <li>Название лендинга 2</li>
          <li>Название лендинга 3</li>
        </div>
        <div class="panel-footer">
          <a href="#" class="btn btn-primary btn-sm">Создать</a>
        </div>
      </div>
    </div>

  </div>

  <div class="row">

    <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading"><a href="#">Мастер-классы ></a></div>
        <div class="panel-body">
          <li>Название мастер-класса 1</li>
          <li>Название мастер-класса 2</li>
          <li>Название мастер-класса 3</li>
        </div>
        <div class="panel-footer">
          <a href="#" class="btn btn-primary btn-sm">Создать</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading"><a href="#">Статьи ></a></div>
        <div class="panel-body">
          <li>Название статьи 1</li>
          <li>Название статьи 2</li>
          <li>Название статьи 3</li>
        </div>
        <div class="panel-footer">
          <a href="#" class="btn btn-primary btn-sm">Добавить</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading"><a href="#">Пользователи ></a></div>
        <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Имя</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <td>-</td>
              <td>-</td>
            </tbody>
          </table>
        </div>
        <div class="panel-footer">
          <a href="#" class="btn btn-primary btn-sm">Добавить</a>
        </div>
      </div>
    </div>

  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-danger">
        <div class="panel-heading"><a href="#">Статистика сайта</a></div>
        <div class="panel-body">
          Графики и таблицы посещаемости и продаж
        </div>
      </div>
    </div>

  </div>

</div>
@endsection
