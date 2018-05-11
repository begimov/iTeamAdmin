<template>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-danger">
        <div class="panel-heading">Новый заказ</div>
        <div class="panel-body">
          <form action="#" @submit.prevent="saveOrder">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Продукт</label>
                  <multiselect v-model="params.product_id"
                  :options="options.products"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите продукт"
                  label="name"
                  track-by="id">
                    <span slot="noResult">Продукт не найден</span>
                  </multiselect>
                  <div class="help-block alert-danger" v-if="errors['product']">
                    {{ errors['product'][0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Тип оплаты</label>
                  <multiselect v-model="params.payment_type_id"
                  :options="options.paymentTypes"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите"
                  label="name"
                  track-by="id"></multiselect>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Статус оплаты</label>
                  <multiselect v-model="params.payment_state_id"
                  :options="options.paymentStates"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите"
                  label="name"
                  track-by="id">
                    <span slot="noResult">Статус оплаты не найден</span>
                  </multiselect>
                  <div class="help-block alert-danger" v-if="errors['paymentState']">
                    {{ errors['paymentState'][0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Цена</label>
                  <div class="input-group">
                    <div class="input-group-addon">{{ params.product_id ? Math.round(params.product_id.price) : '-' }}</div>
                    <input type="text" class="form-control" v-model="params.price">
                  </div>
                  <div class="help-block alert-danger" v-if="errors['orderPrice']">
                    {{ errors['orderPrice'][0] }}
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <multiselect v-model="params.user_id"
                  :options="options.emails"
                  @search-change="getEmails"
                  :loading="isLoading"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите email"
                  label="value"
                  track-by="id">
                    <span slot="noResult">Email не найден</span>
                  </multiselect>
                  <div class="help-block alert-danger" v-if="errors['email']">
                    {{ errors['email'][0] }}
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="#" class="btn btn-default" @click.prevent="cancelOrder">Отменить</a>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./neworder.js"></script>
