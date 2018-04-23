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

              <hr>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="id youtube видео...">
                  </div>
                  <p><a href="#" class="btn btn-default" @click.prevent="addVideo">Добавить видео</a></p>
                </div>
              </div>

              <hr>
              
              <div class="row">
                <div class="col-md-12">
                  <file-uploader 
                    :parent-resource-id="id" 
                    parent-resource-type="material">
                  </file-uploader>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <ul class="list-inline">
                    <li><button type="submit" class="btn btn-primary">Сохранить</button></li>
                    <li><a href="#" class="btn btn-default" @click.prevent="cancel">Отменить</a></li>
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
