<div class="row">
  <div class="col-md-12">
    <p>
      <quill-editor v-model="data.text"></quill-editor>
      <div class="form-check" style="margin:10px 0;">
        <input type="checkbox" v-model="data.isCard" class="form-check-input">
        <label class="form-check-label">Отображать текст на карточке</label>
      </div>
    </p>  
  </div>
</div>
