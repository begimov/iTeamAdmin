<div class="row">
  <div class="col-md-4 col-sm-4">
    <img-uploader v-model="data.path"></img-uploader>
  </div>
  <div class="col-md-4 col-sm-4">
    <h2>Название</h2>
    <input type="text" v-model="data.name" class="form-control">
  </div>
  <div class="col-md-4 col-sm-4">
    <h2>Ссылка</h2>
    <input type="text" v-model="data.link" class="form-control">
  </div>
</div>
