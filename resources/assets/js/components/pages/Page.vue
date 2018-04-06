<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <h4>
        <span class="badge">№ {{ page.id }}:</span> {{ page.name }}
      </h4>
      <p>
        Категория: <span class="badge">{{ page.name }}</span>
      </p>
      <p>
        Описание: {{ page.description }}
      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
        <li><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li>
        <!-- <li>
          <select>
            <option v-for="paymentState in paymentStates" :selected="order.payment_state_id == paymentState.id">{{ paymentState.name }}</option>
          </select>
        </li> -->
        <li><a href="#" @click.prevent="deletePage"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></li>
      </ul>
    </div>

  </div>
</template>

<script src="./page.js"></script>
