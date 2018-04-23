<div class="row">
  <div class="col-md-4">
    <p><input type="text" v-model="data.title1" placeholder="Заголовок..." class="form-control"></p>
    <p><quill-editor v-model="data.text1"></quill-editor></p>  
  </div>
  <div class="col-md-4">
    <p><input type="text" v-model="data.title2" placeholder="Заголовок..." class="form-control"></p>
    <p><quill-editor v-model="data.text2"></quill-editor></p>  
  </div>
  <div class="col-md-4">
    <p><input type="text" v-model="data.title3" placeholder="Заголовок..." class="form-control"></p>
    <p><quill-editor v-model="data.text3"></quill-editor></p>  
  </div>
</div>
