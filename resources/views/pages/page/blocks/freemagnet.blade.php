<div class="row">
  <div class="col-md-4 col-sm-4">
    <file-uploader 
      v-model="data.files.doc1" 
      parent-resource-type="element"
      maxFiles="1">
    </file-uploader>
  </div>
  <div class="col-md-8 col-sm-8">
    <div class="form-group">
      <label>{{ trans('blocks.freemagnet.token') }}</label>
      <input type="text" v-model="data.campaignToken" class="form-control">
    </div>
    <div class="form-group">
      <label>{{ trans('blocks.freemagnet.title') }}</label>
      <input type="text" v-model="data.title" class="form-control">
    </div>
    <div class="form-group">
      <label>{{ trans('blocks.freemagnet.description') }}</label>
      <input type="text" v-model="data.description" class="form-control">
    </div>
    <div class="form-group">
      <label>{{ trans('blocks.freemagnet.buttonText') }}</label>
      <input type="text" v-model="data.buttonText" class="form-control">
    </div>
  </div>
</div>
