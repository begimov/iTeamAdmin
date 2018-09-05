<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div> -->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4>Новый тест</h4>

            <div class="row">
              <div class="col-md-6">
                <!-- <div class="form-group">
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
                  <span class="help-block alert-danger" v-if="errors.category_id">{{ errors.category_id[0] }}</span>
                </div>
                <div class="form-group">
                  <multiselect :value="themeParams"
                    :options="themeOptions"
                    v-on:input="updateThemeParams"
                    select-label=""
                    selected-label="Выбран"
                    deselect-label=""
                    placeholder="Выберите тему"
                    label="name"
                    track-by="id">
                    <span slot="noResult">Тема не найдена</span>
                  </multiselect>
                  <span class="help-block alert-danger" v-if="errors.theme_id">{{ errors.theme_id[0] }}</span>
                </div> -->
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Введите название теста..." v-model="testName">
                  <!-- <span class="help-block alert-danger" v-if="errors.name">{{ errors.name[0] }}</span> -->
                </div>
              </div>
              <div class="col-md-6">
                <!-- <div class="form-group">
                  <textarea class="form-control" placeholder="Введите описание страницы..." v-model="pageDesc" cols="30" rows="4"></textarea>
                  <span class="help-block alert-danger" v-if="errors.description">{{ errors.description[0] }}</span>
                </div> -->
              </div>
            </div>

          </div>

          <div class="panel-footer">
            <!-- <a href="#" class="btn btn-primary" @click.prevent="save" v-if="!editedPageId">Создать</a> -->
            <!-- <a href="#" class="btn btn-primary" @click.prevent="update(editedPageId)" v-else>Сохранить</a> -->
            <a href="#" class="btn btn-default" @click.prevent="cancel">Отменить</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./newtest.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
