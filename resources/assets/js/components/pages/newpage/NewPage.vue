<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Новая страница</h4>
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
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Введите название страницы..." v-model="pageName">
            </div>
            <div class="form-group">
              <textarea class="form-control" placeholder="Введите описание продукта..." v-model="pageDesc" cols="30" rows="4"></textarea>
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
                    <hr :key="block.id">
                </template>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <a href="#" class="btn btn-default" @click.prevent="isShowingBlocksPanel = !isShowingBlocksPanel">Добавить блок</a>
              </div>
            </div>
            <div class="row" v-if="isShowingBlocksPanel">
              <div class="col-md-12">
                <p v-for="block in blocks" :key="block.id">
                  <a href="#" @click.prevent="addBlockToLayout({tag: block.tag, id: Date.now()})">{{ block.name }}</a>
                </p>
              </div>
            </div>
          </div>

          <div class="panel-footer">
            <a href="#" class="btn btn-primary" @click.prevent="save">Сохранить</a>
            <a href="#" class="btn btn-default">Отменить</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./newpage.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
