<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <p>
        <h4>
          {{ product.name }}
        </h4>
      </p>
      <p>
        Базовая цена: <span class="badge">{{ product.price }}&nbsp;&#8381;</span>
      </p>
      <p>
        Категория: {{ product.category.data.name }}
      </p>
      <p>
        <ul class="list-inline">
          <li v-for="priceTag in product.priceTags.data">
            <span class="label label-default">
              {{ priceTag.name }}: {{ priceTag.price }}&nbsp;&#8381;
            </span>
          </li>
        </ul>

      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
        <li><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li>
        <li><a href="#" @click.prevent="deleteProduct"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></li>
      </ul>
    </div>

  </div>
</template>

<script src="./product.js"></script>
