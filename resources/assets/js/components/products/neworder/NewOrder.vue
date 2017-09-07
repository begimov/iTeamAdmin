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
                  <multiselect v-model="params.product"
                  :options="options.products"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите продукт"
                  label="name"
                  track-by="id">
                    <span slot="noResult">Продукт не найден</span>
                  </multiselect>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Тип оплаты</label>
                  <multiselect v-model="params.paymentType"
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
                  <multiselect v-model="params.paymentState"
                  :options="options.paymentStates"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите"
                  label="name"
                  track-by="id">
                    <span slot="noResult">Статус оплаты не найден</span>
                  </multiselect>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Цена</label>
                  <div class="input-group">
                    <div class="input-group-addon">{{ params.product ? Math.round(params.product.price) : '-' }}</div>
                    <input type="text" class="form-control" v-model="params.orderPrice">
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <autocomplete :items="options.emails"
                  v-model="params.email"
                  :min-len="1"
                  placeholder="Введите email"
                  input-class="form-control"
                  @update-items="updateEmails">
                  </autocomplete>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Имя</label>
                  <autocomplete :items="options.names"
                  v-model="params.name"
                  :min-len="1"
                  placeholder="Введите имя"
                  input-class="form-control"
                  @update-items="updateNames">
                  </autocomplete>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Телефон</label>
                  <autocomplete :items="options.phones"
                  v-model="params.phone"
                  :min-len="1"
                  placeholder="Введите телефон"
                  input-class="form-control"
                  @update-items="updatePhones">
                  </autocomplete>
                </div>
              </div>
            </div>

            <div class="row" v-if="params.paymentType && params.paymentType.name == 'Счет'">
              <div class="col-md-2">
                <div class="form-group">
                  <label>ОПФ</label>
                  <multiselect v-model="params.opf"
                  :options="options.opf"
                  select-label=""
                  selected-label="Выбран"
                  deselect-label=""
                  placeholder="Выберите"
                  label="name"
                  track-by="id">
                    <span slot="noResult">ОПФ не найдена</span>
                  </multiselect>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Компания</label>
                  <autocomplete :items="options.companies"
                  v-model="params.company"
                  :min-len="1"
                  placeholder="Введите название компании"
                  input-class="form-control"
                  @update-items="updateCompanies">
                  </autocomplete>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Комментарий</label>
                  <textarea class="form-control" v-model="params.comment" rows="1" cols="50">Введите комментарий</textarea>
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
