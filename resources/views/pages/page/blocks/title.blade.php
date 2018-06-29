<div class="row">
  <div class="col-md-12">
    <p>
      <!-- <quill-editor v-model="data.text" :options="{modules: {toolbar: [[{ 'align': [] }],[{ 'color': [] }]]}}"></quill-editor> -->
      <div class="form-group">
        <input type="text" v-model="data.text" placeholder="Заголовок..." class="form-control">
      </div>
      <div class="form-group">
        <input type="text" v-model="data.subtext" placeholder="Подзаголовок..." class="form-control">
      </div>
    </p>  
  </div>
</div>
