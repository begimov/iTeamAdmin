<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-danger">
          <div class="panel-heading">Заказы</div>

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
