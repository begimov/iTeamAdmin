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
            <form action="#">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" placeholder="Введите название материала" v-model="name">
                    <span class="help-block alert-danger" v-if="errors['name']">{{ errors['name'][0] }}</span>
                  </div>
                </div>
              </div>

              <hr>

              <div class="row" v-if="videos.length">
                <div class="col-md-4" v-for="(video, index) in videos" :key="index">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" :src="'https://www.youtube.com/embed/' + video.identifier" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                      </div>
                    </div>
                    <div class="panel-footer">
                      <a href="#" @click.prevent="removeVideo(index)" class="btn btn-primary btn-sm">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="id youtube видео..." v-model="videoId">
                  </div>
                  <p><a href="#" class="btn btn-default" @click.prevent="addVideo">Добавить видео</a></p>
                </div>
              </div>

              <hr>

              <div class="row" v-if="editedMaterialId && files.length">
                <div class="col-md-12">
                  <ul class="list-inline">
                    <li v-for="(file, index) in files" :key="index">
                      <h4>
                        <span class="label label-primary">
                          {{ file.name }}: {{ file.size }}
                          <a href="#" @click.prevent="removeFile(file.id)">
                            <span class="glyphicon glyphicon-remove label--remove-icon" aria-hidden="true"></span>
                          </a>
                        </span> 
                      </h4>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <file-uploader 
                    :parent-resource-id="id" 
                    parent-resource-type="material"
                    max-filesize=100>
                  </file-uploader>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <ul class="list-inline">
                    <li>
                      <a href="#" class="btn btn-primary" @click.prevent="saveNewMaterial" v-if="!editedMaterialId">Создать</a>
                      <a href="#" class="btn btn-primary" v-else @click.prevent="updateMaterial(editedMaterialId)">Сохранить</a>
                    </li>
                    <li><a href="#" class="btn btn-default" @click.prevent="cancelMaterial">Отменить</a></li>
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
