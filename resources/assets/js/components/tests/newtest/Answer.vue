<template>
  <div>
    <div class="col-md-10">
      <div class="form-group">
        <input type="text" v-model="answer.answer" class="form-control" placeholder="Ответ...">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <input type="text" v-model="answer.points" class="form-control" placeholder="Очки...">
      </div>
    </div>
  </div>
</template>

<script src="./answer.js"></script>
