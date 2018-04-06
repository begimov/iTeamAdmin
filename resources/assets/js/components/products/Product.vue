<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <h4>
        <span class="badge">№ {{ product.id }}:</span> {{ product.name }}
      </h4>
      <p>
        Базовая цена: <span class="badge">{{ product.price }}&nbsp;&#8381;</span>
      </p>
      <p>
        Категория: {{ product.category.data.name }}
      </p>
      <p>
        <ul class="list-inline">
          <li v-for="priceTag in product.priceTags.data" :key="priceTag.id">
            <span class="label label-default">
              {{ priceTag.name }}: {{ priceTag.price }}&nbsp;&#8381;
            </span>
          </li>
        </ul>

      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li> -->
      </ul>
    </div>

  </div>
</template>

<script src="./product.js"></script>
