<template>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-danger">
          <div class="panel-heading">Новый заказ</div>

          <div class="panel-body">
            <form action="#" @submit.prevent="saveOrder">
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" placeholder="Email">
              </div>
              <button type="submit" class="btn btn-primary">Сохранить</button>
              <a href="#" class="btn btn-default" @click.prevent="cancelOrder">Отменить</a>
            </form>
          </div>
        </div>
      </div>
    </div>
</template>

<script src="./neworder.js"></script>
