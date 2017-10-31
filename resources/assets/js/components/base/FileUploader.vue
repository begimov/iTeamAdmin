<template>
  <div>
    <vue-dropzone 
      ref="fileUploader" 
      id="fileUploader" 
      :options="options"
      @vdropzone-removed-file="fileRemoved"
      @vdropzone-success="fileUploaded" />
  </div>
</template>

<script src="./fileuploader.js"></script>