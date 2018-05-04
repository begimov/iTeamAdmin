<template>
  <div>
    <vue-dropzone 
      ref="fileUploader" 
      id="fileUploader"
      :options="options"
      :destroyDropzone="false"
      @vdropzone-success="fileUploaded"
      @vdropzone-removed-file="fileRemoved"
      @vdropzone-sending="fileSending" />
  </div>
</template>

<script src="./fileuploader.js"></script>