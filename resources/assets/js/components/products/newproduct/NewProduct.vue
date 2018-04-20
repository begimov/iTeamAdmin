<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
        <div class="panel panel-default">

          <div class="panel-heading">
            Новый продукт
          </div>

          <div class="panel-body">
            <form action="#" @submit.prevent="saveProduct">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Категория</label>
                    <multiselect :value="categoryParams"
                    :options="categoryOptions"
                    v-on:input="updateCategoryParams"
                    select-label=""
                    selected-label="Выбран"
                    deselect-label=""
                    placeholder="Выберите категорию"
                    label="name"
                    track-by="id">
                      <span slot="noResult">Категория не найдена</span>
                    </multiselect>
                    <span class="help-block alert-danger" v-if="errors['category.id']">{{ errors['category.id'][0] }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" placeholder="Введите название продукта" v-model="name">
                    <span class="help-block alert-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Материалы</label>
                    <p v-for="materialParam in materialParams" :key="materialParam.id">
                      <span class="custom__tag">
                        <span>{{ materialParam.name }}</span>
                        <span class="custom__remove" @click="console.log('removeMaterial')">
                          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </span>
                      </span>
                    </p>
                    <multiselect :value="materialParams"
                    :options="materialOptions"
                    v-on:input="updateMaterialParams"
                    :multiple="true"
                    :hide-selected="true"
                    :close-on-select="false"
                    select-label=""
                    selected-label="Выбран"
                    deselect-label=""
                    placeholder="Выберите материал"
                    label="name"
                    track-by="id">
                      <span slot="noResult">Материал не найден</span>
                      <template slot="tag">
                        &nbsp;
                      </template>
                    </multiselect>
                    <span class="help-block alert-danger" v-if="errors.materials">{{ errors.materials[0] }}</span>
                    <br>
                    <a href="#" @click.prevent="switchNewMaterial(true)" class="btn btn-default btn-sm">Создать материал</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Базовая цена, &nbsp;&#8381;</label>
                    <input type="text" class="form-control" placeholder="Введите цену по умолчанию" v-model="basePrice">
                    <span class="help-block alert-danger" v-if="errors.basePrice">{{ errors.basePrice[0] }}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <ul class="list-inline" v-if="priceTags.length">
                    <li v-for="(priceTag, index) in priceTags" :key="index">
                      <h4>
                        <span class="label label-primary">
                          {{ priceTag.name }}: {{ priceTag.price }}
                          <a href="#" @click.prevent="removePriceTag(index)">
                            <span class="glyphicon glyphicon-remove label--remove-icon" aria-hidden="true"></span>
                          </a>
                        </span> 
                      </h4>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Дополнительная цена</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Специальная доп. цена, руб." v-model="priceTagPrice">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Название, например, Участник..." v-model="priceTagName">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                  <a href="#" class="btn btn-default" @click.prevent="addPriceTag">Добавить цену</a>
                </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <ul class="list-inline">
                    <li><button type="submit" class="btn btn-primary">Сохранить</button></li>
                    <li><a href="#" class="btn btn-default" @click.prevent="cancel">Отменить</a></li>
                  </ul>
                </div>
              </div>

            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="row" v-if="isNewMaterialOn">
      <new-material @cancelNewMaterial="switchNewMaterial(false)"></new-material>
    </div>

  </div>
</template>

<script src="./newproduct.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
