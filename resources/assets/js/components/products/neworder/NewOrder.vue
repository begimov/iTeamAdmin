<template>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-danger">
        <div class="panel-heading">Новый заказ</div>

        <div class="panel-body">

          <div class="row">

            <form action="#" @submit.prevent="saveOrder">

              <div class="col-md-4">

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" v-model="params.email" placeholder="Введите email">
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
                  track-by="id"></multiselect>
                </div>

                <div class="form-group">
                  <label>Имя</label>
                  <input type="text" class="form-control" v-model="params.name" placeholder="Введите имя">
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="#" class="btn btn-default" @click.prevent="cancelOrder">Отменить</a>

              </div>

              <div class="col-md-4">

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
                  <input type="text" class="form-control" v-model="params.phone" placeholder="Введите телефон">
                </div>

              </div>

              <div class="col-md-4">

                <div class="form-group">
                  <label>Цена продукта / Фактическая цена заказа</label>
                  <div class="input-group">
                    <div class="input-group-addon">{{ this.params.product.price }}&nbsp;&#8381;</div>
                    <input type="text" class="form-control" v-model="params.orderPrice" value="4000">
                  </div>
                </div>

                <div class="form-group">
                  <label>Комментарий</label>
                  <textarea class="form-control" v-model="params.comment" rows="4" cols="50">Введите комментарий</textarea>
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
