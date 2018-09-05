<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <h4>
        <span class="badge">№ {{ test.id }}:</span> {{ test.name }}
      </h4>
      <p>
        Описание: {{ test.description }}
      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
        <li><a href="#" @click.prevent="editTest"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li>
      </ul>
    </div>

  </div>
</template>

<script src="./test.js"></script>
