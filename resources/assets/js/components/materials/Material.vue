<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <h4>
        <span class="badge">№ {{ material.id }}:</span> {{ material.name }}
      </h4>
      <p v-if="material.products.data.length">
        Продукты: 
        <template v-for="product in material.products.data">
          <span :key="product.id" class="badge">{{ product.name }}</span>&nbsp;
        </template>
      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
        <li>
          <a :href="material.accessUrl" target="_blank">
            <span class="glyphicon glyphicon-link" aria-hidden="true"></span> Ссылка
          </a>
        </li>
        <li>
          <a href="#" @click.prevent="editMaterial">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать
          </a>
        </li>
      </ul>
    </div>

  </div>
</template>

<script src="./material.js"></script>
