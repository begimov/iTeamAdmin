<template>
  <div class="row panel-row">

    <div class="col-md-6">
      <h4>
        <span class="badge">№ {{ review.id }}:</span> {{ review.author }}
      </h4>
      <h5>{{ review.position }}</h5>
      <p>
        {{ review.quote }}
      </p>
    </div>

    <div class="col-md-6 text-right orders-edit-block">
      <!-- <ul class="list-inline">
        <li><a href="#" @click.prevent="editTest"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li>
      </ul> -->
    </div>

  </div>
</template>

<script src="./review.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>