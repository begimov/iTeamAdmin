<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
        <div class="panel panel-default">

          <div class="panel-heading">
            Новый материал
          </div>

          <div class="panel-body">
            <form action="#" @submit.prevent="saveMaterial">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" placeholder="Введите название материала" v-model="name">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <file-uploader :resource-id="id"></file-uploader>
                </div>
              </div>
              <hr>
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

<script src="./newmaterial.js"></script>
