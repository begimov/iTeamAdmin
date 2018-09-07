<template>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
          <label>Вопрос</label>
          <input type="text" v-model="question.question" class="form-control">
      </div>
    </div>
    <div class="panel-footer"><a href="#" class="btn btn-default btn-sm" >Удалить вопрос</a></div>
  </div>
</template>

<script src="./question.js"></script>
