<template>
  <div>
    <vue-dropzone 
      ref="fileUploader" 
      id="fileUploader"
      :options="options"
      @vdropzone-success="fileUploaded"
      @vdropzone-removed-file="fileRemoved" />
  </div>
</template>

<script src="./fileuploader.js"></script>