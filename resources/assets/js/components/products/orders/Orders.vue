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
                  <h4><span class="label label-primary">Сумма:</span> <small>75751.5&nbsp;&#8381;</small>
                  <span class="label label-primary">Период поиска:</span> <small>29.08.14 - 29.08.17</small></h4><br>
              </div>
              <div class="col-md-6 text-right">
                <ul class="list-inline">
                  <li><input type="text" class="form-control" placeholder="Найти..."
                          v-model="params.filters.textSearch"
                          @input="textSearch"></li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <span class="glyphicon glyphicon-sort" aria-hidden="true"></span><span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="#" @click.prevent="applyOrder('latest')">По дате</a></li>
                          <li><a href="#" @click.prevent="applyOrder('largestIds')">По номеру</a></li>
                      </ul>
                  </li>
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
