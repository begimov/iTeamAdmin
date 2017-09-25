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
                    <multiselect :value="categoryParams"
                    :options="categoryOptions"
                    v-on:input="updateCategoryParams"
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
                    <multiselect :value="materialParams"
                    :options="materialOptions"
                    v-on:input="updateMaterialParams"
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
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Базовая цена, &nbsp;&#8381;</label>
                    <input type="text" class="form-control" placeholder="Введите цену по умолчанию">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Специальная цена, руб.">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Название, например, Участник...">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                  <a href="#" class="btn btn-primary">Добавить</a>
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
