<div class="row">
  <div class="col-md-4">
    <p>
      <file-uploader 
        v-model="data.files.img1" 
        parent-resource-type="element"
        maxFiles="1"
        max-filesize=1>
      </file-uploader>
    </p>
    <p><input type="text" v-model="data.title1" placeholder="Заголовок..." class="form-control"></p>
    <p><quill-editor v-model="data.text1"></quill-editor></p>  
  </div>
  <div class="col-md-4">
    <p>
      <file-uploader 
        v-model="data.files.img2" 
        parent-resource-type="element"
        maxFiles="1"
        max-filesize=1>
      </file-uploader>
    </p>
    <p><input type="text" v-model="data.title2" placeholder="Заголовок..." class="form-control"></p>
    <p><quill-editor v-model="data.text2"></quill-editor></p>  
  </div>
  <div class="col-md-4">
    <p>
      <file-uploader 
        v-model="data.files.img3" 
        parent-resource-type="element"
        maxFiles="1"
        max-filesize=1>
      </file-uploader>
    </p>
    <p><input type="text" v-model="data.title3" placeholder="Заголовок..." class="form-control"></p>
    <p><quill-editor v-model="data.text3"></quill-editor></p>  
  </div>
</div>
