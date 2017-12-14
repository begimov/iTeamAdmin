<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="form-group">
              <h4>Новая страница</h4>
              {{ layout }}<br>
              <input type="text" class="form-control" placeholder="Введите название страницы">
            </div>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <template v-for="block in layout.blocks">
                  <component :is="block.tag" :key="block.id" :id="block.id" v-on:elementDeleted="deleteElement"></component>
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
