<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <p>
        <h4>
          <span class="badge">№ {{ page.id }}:</span> {{ page.name }}
        </h4>
      </p>
      <p>
        <!-- Базовая цена: <span class="badge">{{ page.price }}&nbsp;&#8381;</span> -->
      </p>
      <p>
        <!-- Категория: {{ page.category.data.name }} -->
      </p>
      <p>
        <!-- <ul class="list-inline">
          <li v-for="priceTag in page.priceTags.data">
            <span class="label label-default">
              {{ priceTag.name }}: {{ priceTag.price }}&nbsp;&#8381;
            </span>
          </li>
        </ul> -->

      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
        <li><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li>
        <!-- TODO: do we need states for pages, maybe use them only on pages, cause nobody can reach page without related page -->
        <!-- <li>
          <select>
            <option v-for="paymentState in paymentStates" :selected="order.payment_state_id == paymentState.id">{{ paymentState.name }}</option>
          </select>
        </li> -->
        <li><a href="#" @click.prevent="deletepage"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></li>
      </ul>
    </div>

  </div>
</template>

<script src="./page.js"></script>
