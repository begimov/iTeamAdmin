<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div> -->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4>Новый отзыв</h4>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Автор</label>
                  <input type="text" class="form-control" placeholder="Введите автора отзыва..." v-model="reviewAuthor">
                  <!-- <span class="help-block alert-danger" v-if="errors.name">{{ errors.name[0] }}</span> -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Должность</label>
                  <input type="text" class="form-control" placeholder="Введите должность и компанию автора..." v-model="authorPosition">
                  <!-- <span class="help-block alert-danger" v-if="errors.description">{{ errors.description[0] }}</span> -->
                </div>
              </div>
            </div>
          </div>

          <div class="panel-footer">
            <!-- <a href="#" class="btn btn-primary" @click.prevent="save" v-if="!editedTestId">Создать</a> -->
            <!-- <a href="#" class="btn btn-primary" @click.prevent="update(editedPageId)" v-else>Сохранить</a> -->
            <a href="#" class="btn btn-default" @click.prevent="cancel">Отменить</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./newreview.js"></script>
