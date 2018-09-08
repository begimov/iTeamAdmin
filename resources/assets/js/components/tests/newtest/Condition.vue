<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
          <input type="text" v-model="condition.name" class="form-control" placeholder="Ответ...">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <input type="text" v-model="condition.score" class="form-control" placeholder="Ответ...">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <textarea type="text" v-model="condition.description" cols="30" rows="10" class="form-control"></textarea>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./condition.js"></script>
