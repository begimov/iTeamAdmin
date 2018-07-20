<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <h4>
        <span class="badge">№ {{ material.id }}:</span> {{ material.name }}
      </h4>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
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
