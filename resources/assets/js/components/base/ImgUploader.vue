<template>
  <div>
    <div v-if="uploading">Загрузка...</div>
    <label v-else class="btn btn-primary btn-xs">Выбрать изображение
      <input type="file" v-on:change="fileChange" style="display:none">
    </label>
    <div v-if="img.path">
      <input type="hidden" name="img_id" :value="img.id">
      <img :src="img.path" class="img-responsive img-rounded">
    </div>
  </div>
</template>

<script src="./imguploader.js"></script>
