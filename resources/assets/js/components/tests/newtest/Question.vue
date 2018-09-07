<template>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Вопрос</label>
                <input type="text" v-model="question.question" class="form-control">
              </div>
            </div>
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
