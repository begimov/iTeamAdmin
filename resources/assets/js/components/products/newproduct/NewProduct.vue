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
                    <label>Категория</label>
                    <multiselect v-model="materialParams"
                    :options="materialOptions"
                    select-label=""
                    selected-label="Выбран"
                    deselect-label=""
                    placeholder="Выберите категорию"
                    label="name"
                    track-by="id">
                      <span slot="noResult">Категория не найдена</span>
                    </multiselect>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" placeholder="Введите название продукта">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Материалы</label>
                    <multiselect v-model="materialParams"
                    :options="materialOptions"
                    select-label=""
                    selected-label="Выбран"
                    deselect-label=""
                    placeholder="Выберите материал"
                    label="name"
                    track-by="id">
                      <span slot="noResult">Материал не найден</span>
                    </multiselect>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Цена</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">+</button>
                      </span>
                    </div>
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
