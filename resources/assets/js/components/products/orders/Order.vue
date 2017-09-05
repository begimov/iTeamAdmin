<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <p>
        <h4>
          {{ order.user.data.name }}
          <small>
            <a href="mailto:">
              <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> {{ order.user.data.email }}
            </a>
            <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> +79190442550
          </small>
        </h4>
      </p>
      <p><span class="badge">Заказ № {{ order.id }}:</span> <small>&laquo;Как улучшить бизнес-процессы компании&raquo;</small></p>
      <p>
        <span class="badge">
          4000&nbsp;&#8381;
        </span>
        <small>
          {{ order.paymentType ? order.paymentType.data.name : '' }}
          <span class="label label-warning">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Оформлен 29.11 в 22:35
          </span>
          <span class="label label-success">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Оплачен 30.11 в 12:35
          </span>
        </small>
      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
        <li><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li>
        <li>
          <select>
            <option v-for="paymentState in paymentStates" :selected="order.payment_state_id == paymentState.id">{{ paymentState.name }}</option>
          </select>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></li>
      </ul>
    </div>

  </div>

</template>

<script src="./order.js"></script>
