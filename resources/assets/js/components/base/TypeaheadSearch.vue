<template>
  <autocomplete :items="options"
  v-model="query"
  :min-len="1"
  :get-label="getLabel"
  input-class="form-control"
  :component-item='template'
  @input="change"
  @change="change"
  @update-items="updateItems">
  </autocomplete>
</template>

<script src="./typeaheadsearch.js"></script>
