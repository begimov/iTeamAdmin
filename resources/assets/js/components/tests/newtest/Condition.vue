<template>
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label>Условие:</label>
              <input type="text" v-model="condition.name" class="form-control" placeholder="Заголовок...">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Потолок очков:</label>
              <input type="text" v-model="condition.score" class="form-control" placeholder="Максимум очков...">
            </div>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <textarea type="text" v-model="condition.description" rows="5" class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./condition.js"></script>
