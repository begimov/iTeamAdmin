<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <new-order v-if="flags.neworder" v-on:cancelOrder="flags.neworder = false"></new-order>
            <a href="#" class="btn btn-primary" v-else @click.prevent="flags.neworder = true">Создать заказ</a>
          </div>

          <div class="panel-body">
            <div class="row panel-subheading">
              <div class="col-md-6">
                50 на странице на сумму 75751.5; период поиска: 29.08.2014 - 29.08.2017
              </div>
              <div class="col-md-6 text-right">
                <a href="#" @click.prevent="setIdFilter">Сортировать</a>
              </div>
            </div>

            <div v-for="order in orders">

              <div class="row panel-row">
                <div class="col-md-6">
                  <p><a href="mailto:">smyshnova@yahoo.com</a> Артём ООО Торгсервис +79190442550</p>
                  <p>Заказ № {{ order.id }} Как улучшить бизнес-процессы компании</p>
                  <p>375  Робокасса  <span class="label label-success">Оплачен 30 ноября в 00:00</span></p>
                </div>
                <div class="col-md-6 text-right">
                  <ul class="list-inline">
                    <li><a href="#">Редактировать</a></li>
                    <li>
                      <select>
                        <option>Оплачен</option>
                        <option>Ждет оплаты</option>
                      </select>
                    </li>
                    <li><a href="#">Удалить</a></li>
                  </ul>
                </div>
              </div>

            </div>


          </div>

          <div class="panel-footer">
            pagination
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./orders.js"></script>
