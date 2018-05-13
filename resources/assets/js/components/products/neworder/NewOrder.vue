<template>
  <div class="row">
    <div class="col-md-12">
      <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
      <div class="panel panel-danger">
        <div class="panel-heading">Новый заказ</div>
        <div class="panel-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Продукт</label>
                  <multiselect v-model="order.product"
                  :options="options.products"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите продукт"
                  label="name"
                  track-by="id">
                    <span slot="noResult">Продукт не найден</span>
                  </multiselect>
                  <div class="help-block alert-danger" v-if="errors['product_id']">
                    {{ errors['product_id'][0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Тип оплаты</label>
                  <multiselect v-model="order.paymentType"
                  :options="options.paymentTypes"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите"
                  label="name"
                  track-by="id"></multiselect>
                  <div class="help-block alert-danger" v-if="errors['payment_type_id']">
                    {{ errors['payment_type_id'][0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Статус оплаты</label>
                  <multiselect v-model="order.paymentState"
                  :options="options.paymentStates"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите"
                  label="name"
                  track-by="id">
                    <span slot="noResult">Статус оплаты не найден</span>
                  </multiselect>
                  <div class="help-block alert-danger" v-if="errors['payment_state_id']">
                    {{ errors['payment_state_id'][0] }}
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Цена</label>
                  <div class="input-group">
                    <div class="input-group-addon">{{ order.product ? Math.round(order.product.price) : '-' }}</div>
                    <input type="text" class="form-control" v-model="order.price">
                  </div>
                  <div class="help-block alert-danger" v-if="errors['price']">
                    {{ errors['price'][0] }}
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <multiselect v-model="order.user"
                  :options="options.users"
                  @search-change="getEmails"
                  :loading="isLoading"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите email"
                  label="email"
                  track-by="id">
                    <span slot="noResult">Email не найден</span>
                  </multiselect>
                  <div class="help-block alert-danger" v-if="errors['user_id']">
                    {{ errors['user_id'][0] }}
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" v-if="!editedOrderId" @click.prevent="saveOrder">Создать</button>
                <button type="submit" class="btn btn-primary" v-else @click.prevent="updateOrder">Сохранить</button>
                <a href="#" class="btn btn-default" @click.prevent="cancelOrder">Отменить</a>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./neworder.js"></script>
