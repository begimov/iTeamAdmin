<div class="row">
  <div class="col-md-4 col-sm-4">
    <file-uploader 
      v-model="data.files.img1" 
      parent-resource-type="element"
      maxFiles="1"
      max-filesize=1>
    </file-uploader>
  </div>
  <div class="col-md-8 col-sm-8">
    <quill-editor v-model="data.text"></quill-editor>
  </div>
</div>
