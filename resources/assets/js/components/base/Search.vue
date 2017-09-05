<template>
  <div class="form-group"><input type="text" class="form-control" placeholder="Найти..."
    v-model="query"
    @input="changed">
  </div>
</template>

<script src="./search.js"></script>
