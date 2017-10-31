<template>
  <div>
    <vue-dropzone 
      ref="fileUploader" 
      id="fileUploader" 
      :options="options"
      @vdropzone-removed-file="fileRemoved" />
  </div>
</template>

<script src="./fileuploader.js"></script>