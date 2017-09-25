<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <p>
        <h4>
          {{ product.name }}
        </h4>
      </p>
      <p>
        <span class="badge">
          {{ product.price }}&nbsp;&#8381;
        </span>
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
