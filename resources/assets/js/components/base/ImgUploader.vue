<template>
  <div>
    <div v-if="uploading">Uploading...</div>
    <input v-else id="file" type="file" v-on:change="fileChange" style="display: none">
    <label for="file">Choose a file</label>
    <div v-if="img.path">
      <input type="hidden" name="img_id" :value="img.id">
      <img :src="img.path" class="img-responsive img-rounded">
    </div>
  </div>
</template>

<script src="./imguploader.js"></script>
