<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <h4>
        <span class="badge">№ {{ page.id }}:</span> {{ page.name }}
      </h4>
      <p>
        Категория: <span class="badge">{{ page.category.data.name }}</span>
      </p>
      <p>
        Описание: {{ page.description }}
      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <ul class="list-inline">
        <template v-if="page.status">
          <li><span class="label label-success">Опубликована</span></li>
          <li><a href="#" @click.prevent="updatePageStatus('unpublish')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></li>
        </template>
        <template v-else>
          <li><span class="label label-default">Не опубликована</span></li>
          <li><a href="#" @click.prevent="updatePageStatus('publish')" class="text-success"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></a></li>
        </template>
        <li><a href="#" @click.prevent="editPage"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li>
      </ul>
    </div>

  </div>
</template>

<script src="./page.js"></script>
