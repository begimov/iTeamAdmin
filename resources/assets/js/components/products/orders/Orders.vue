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
                <strong>Сумма:</strong> 75751.5 <strong>Период поиска:</strong> 29.08.2014 - 29.08.2017
              </div>
              <div class="col-md-6 text-right">
                <ul class="list-inline">
                  <li><a href="#" @click.prevent="setIdFilter"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>
                </ul>

              </div>
            </div>

            <order v-for="order in orders" :order="order" :key="order.id"></order>

          </div>

          <div class="panel-footer">
            <paginator v-if="meta && orders.length" for="orders" :pagination="meta.pagination" v-on:orders_pageChanged="getOrders"></paginator>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./orders.js"></script>
