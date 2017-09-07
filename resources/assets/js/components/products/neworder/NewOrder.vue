<template>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-danger">
        <div class="panel-heading">Новый заказ</div>

        <div class="panel-body">
          <div class="row">

            <form action="#" @submit.prevent="saveOrder">

              <div class="col-md-6">

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Введите email">
                </div>

                <div class="form-group">
                  <label>Тип оплаты</label>
                  <multiselect v-model="params.paymentType"
                  :options="options.paymentTypes"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label="Кликните, чтобы убрать"
                  placeholder="Выберите тип оплаты"
                  :searchable="false"
                  label="name"
                  track-by="id">
                  </multiselect>
              </div>

              <div class="form-group">
                <label>Имя</label>
                <input type="text" class="form-control" placeholder="Введите имя">
              </div>

              <div class="form-group">
                <label>Цена заказа</label>
                <input type="text" class="form-control" placeholder="Цена заказа">
              </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="#" class="btn btn-default" @click.prevent="cancelOrder">Отменить</a>

              </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Продукт</label>
                <multiselect v-model="params.product"
                :options="options.products"
                select-label=""
                selected-label="Выбран"
                deselect-label="Кликните, чтобы убрать"
                placeholder="Выберите продукт"
                label="name"
                track-by="id">
                <span slot="noResult">Продукт не найден</span>
                </multiselect>
            </div>

            <div class="form-group">
              <label>Статус оплаты</label>
              <multiselect v-model="params.paymentState"
              :options="options.paymentStates"
              select-label=""
              selected-label="Выбран"
              deselect-label="Кликните, чтобы убрать"
              placeholder="Выберите статус оплаты"
              :searchable="false"
              label="name"
              track-by="id">
              <span slot="noResult">Статус оплаты не найден</span>
              </multiselect>
          </div>

          <div class="form-group">
            <label>Телефон</label>
            <input type="text" class="form-control" placeholder="Введите телефон">
          </div>

          <div class="form-group">
            <label>Комментарий</label>
            <input type="text" class="form-control" placeholder="Введите комментарий">
          </div>

        </div>

      </form>
    </div>





  </div>
</div>
</div>
</div>
</template>

<script src="./neworder.js"></script>
