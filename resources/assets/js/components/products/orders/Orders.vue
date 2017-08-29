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
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th><a href="#" @click.prevent="setIdFilter">Номер</a></th>
                  <th>Клиент</th>
                  <th>Сумма</th>
                  <th>Дата</a></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="order in orders">
                  <th scope="row">{{ order.id }}</th>
                  <td>-</td>
                  <td>-</td>
                  <td>{{ order.created_at }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./orders.js"></script>
