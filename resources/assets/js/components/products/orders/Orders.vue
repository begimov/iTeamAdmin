<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div v-bind:class="{ 'isActive': flags.isLoading, 'loader': true, 'loader-def': true }"></div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <new-order v-if="flags.neworder" v-on:cancelOrder="cancelOrder" v-on:orderSaved="getOrders" :editedOrderId="editedOrderId"></new-order>
            <a href="#" class="btn btn-primary" v-else @click.prevent="flags.neworder = true">Создать заказ</a>
          </div>

          <div class="panel-body">
            <div class="row panel-subheading">
              <div class="col-md-4">
                <h4>
                  <span class="label label-primary">Сумма:</span> <small>{{ totalOrdersCost }}&nbsp;&#8381;</small><br>
                  <!-- <span class="label label-primary">Период поиска:</span> <small>29.08.14 - 29.08.17</small> -->
                </h4>
                <search v-model="params.searchQuery" v-on:input="textSearch"></search>
              </div>
              <div class="col-md-8 text-right">
                <ul class="list-inline">
                  <li>
                    <div>
                      <multiselect v-model="params.filters.paymentState"
                      select-label=""
                      track-by="id"
                      label="name"
                      :options="paymentStates"
                      :multiple="true"
                      :close-on-select="false"
                      :hide-selected="true"
                      :searchable="false"
                      @input = "getOrders(1)"
                      placeholder="Статус оплаты">
                      <template slot="tag" scope="props">
                        <span class="custom__tag">
                          <span>{{ props.option.name }}</span>
                          <span class="custom__remove" @click="props.remove(props.option)">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                          </span>
                        </span>
                      </template>
                      </multiselect>
                    </div>
                  </li>
                  <li>
                    <div>
                      <multiselect v-model="params.filters.paymentType"
                      select-label=""
                      track-by="id"
                      label="name"
                      :options="paymentTypes"
                      :multiple="true"
                      :close-on-select="false"
                      :hide-selected="true"
                      :searchable="false"
                      @input = "getOrders(1)"
                      placeholder="Тип платежа">
                      <template slot="tag" scope="props">
                        <span class="custom__tag">
                          <span>{{ props.option.name }}</span>
                          <span class="custom__remove" @click="props.remove(props.option)">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                          </span>
                        </span>
                      </template>
                      </multiselect>
                    </div>
                  </li>
                  <orderby v-model="params.orderBy" :init-data="params.orderBy"></orderby>
                </ul>
              </div>
            </div>

            <order v-for="order in orders"
            :order="order"
            :payment-states="paymentStates"
            :key="order.id"
            v-on:orderDeleted="getOrders"
            v-on:editOrder="setEditedOrderId"></order>

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
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
