<div class="row">
  <div class="col-md-12">
    <p>
      <quill-editor v-model="data.text"></quill-editor>
      <div class="form-check" style="margin:10px 0;">
        <input type="checkbox" id="isCardCheckbox" v-model="data.isCard" class="form-check-input">
        <label for="isBundleCheckbox" class="form-check-label">Отображать текст на карточке</label>
      </div>
    </p>  
  </div>
</div>
