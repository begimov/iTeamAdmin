<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4>Новая страница</h4>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
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
                  <input type="text" class="form-control" placeholder="Введите название страницы..." v-model="pageName">
                  <span class="help-block alert-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                  <span class="help-block alert-danger" v-if="!errors.name && errors.slug">{{ errors.slug[0] }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" placeholder="Введите описание страницы..." v-model="pageDesc" cols="30" rows="4"></textarea>
                  <span class="help-block alert-danger" v-if="errors.description">{{ errors.description[0] }}</span>
                </div>
              </div>
            </div>

          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <template v-for="block in layout.blocks">
                  <component 
                    :is="block.tag" 
                    :key="block.id" 
                    :id="block.id" 
                    v-on:elementMovedUp="moveElementUp"
                    v-on:elementMovedDown="moveElementDown"
                    v-on:elementDeleted="deleteElement"
                    ></component>
                </template>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <span class="help-block alert-danger" v-if="errors.elements">{{ errors.elements[0] }}</span>
                <p><a href="#" class="btn btn-default" @click.prevent="isShowingBlocksPanel = !isShowingBlocksPanel">Добавить блок</a></p>
              </div>
            </div>
            <div class="row" v-if="isShowingBlocksPanel">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-3 col-sm-4 col-xs-6" v-for="block in blocks" :key="block.id">
                        <p>
                          <a href="#" @click.prevent="addBlockToLayout({tag: block.tag, id: Date.now()})">{{ block.name }}</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="panel-footer">
            <a href="#" class="btn btn-primary" @click.prevent="save" v-if="!editedPageId">Создать</a>
            <a href="#" class="btn btn-primary" @click.prevent="update(editedPageId)" v-else>Сохранить</a>
            <a href="#" class="btn btn-default" @click.prevent="cancel">Отменить</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./newpage.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
