<template>
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <p>Вопрос:</p>
        <div class="form-group">
          <input type="text" v-model="question.question" class="form-control">
        </div>
        </div>
      <div class="panel-body">
          <div class="row" v-for="(answer, index) in question.answers" :key="index">
            <answer v-model="question.answers[index]" />
          </div>
          <div class="row">
            <div class="col-md-12">
              <a href="#" class="btn btn-default btn-sm" @click.prevent="addAnswer">Добавить ответ</a>
            </div>
          </div>
      </div>
      <div class="panel-footer"><a href="#" class="btn btn-default btn-sm" >Удалить вопрос</a></div>
    </div>
  </div>
</template>

<script src="./question.js"></script>
