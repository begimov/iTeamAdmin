<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">

          <div class="panel-heading">
            Новый продукт
          </div>

          <div class="panel-body">
            <form action="#" @submit.prevent="saveProduct">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" placeholder="...">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Материалы</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Добавить</button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Цена</label>
                    <input type="text" class="form-control" placeholder="...">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <ul class="list-inline">
                    <li><button type="submit" class="btn btn-primary">Сохранить</button></li>
                    <li><router-link :to="{name: 'products'}" class="btn btn-default">Отменить</router-link></li>
                  </ul>
                </div>
              </div>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./newproduct.js"></script>
