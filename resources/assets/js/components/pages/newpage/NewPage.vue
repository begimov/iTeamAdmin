<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="form-group">
              <h4>Новая страница</h4>
              <input type="text" class="form-control" placeholder="Введите название страницы">
            </div>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <template v-for="(block, index) in layout">
                  <component :is="blocks[block].name" :key="index"></component>
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
                BLOCKS
              </div>
            </div>
          </div>

          <div class="panel-footer">
            <a href="#" class="btn btn-primary">Сохранить</a>
            <a href="#" class="btn btn-default">Отменить</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./newpage.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
