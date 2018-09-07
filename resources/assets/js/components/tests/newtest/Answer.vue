<template>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" v-model="question.question" class="form-control" placeholder="Ответ...">
              </div>
            </div>
          </div>
      </div>
      <div class="panel-footer"><a href="#" class="btn btn-default btn-sm" >Удалить ответ</a></div>
    </div>
  </div>
</template>

<script src="./answer.js"></script>
