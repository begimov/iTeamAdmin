<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <h4>
        {{ order.user.data.name }}
        <small>
          <a :href="'mailto:' + order.user.data.email">
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> {{ order.user.data.email }}
          </a>
          <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> {{ order.user.data.userProfile.data.phone }}
        </small>
      </h4>
      <p><span class="badge">Заказ № {{ order.id }}:</span> <small>&laquo;{{ order.product.data.name }}&raquo;</small></p>
      <p>
        <span class="badge">
          {{ order.price ? order.price : order.product.data.price }}&nbsp;&#8381;
        </span>
        <small>
          {{ order.paymentType ? order.paymentType.data.name : '' }}
          <span class="label label-warning">
            Оформлен {{ order.created_at_human }}
          </span>
          <span class="label label-success" v-if="order.payment_state_id === 2">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Оплачен  {{ order.updated_at_human }}
          </span>
        </small>
      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li> -->
        <li>
          <select v-model="selectedPaymentStateId">
            <option v-for="paymentState in paymentStates" 
              :key="paymentState.id"
              :value="paymentState.id">
                {{ paymentState.name }}
            </option>
          </select>
        </li>
        <li><a href="#" @click.prevent="deleteOrder"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></li>
      </ul>
    </div>

  </div>

</template>

<script src="./order.js"></script>
