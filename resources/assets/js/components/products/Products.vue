<template>
  <div>
    <new-product v-if="currentModule === 'newproduct'" v-on:cancelNewProduct="cancelNewProduct" :editedProductId="editedProductId"></new-product>
    <div class="container" v-if="currentModule === 'products'">
      <div class="row">
        <div class="col-md-12">
          <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
          <div class="panel panel-default">
            <div class="panel-heading">
              
              <a href="#" @click.prevent="setCurrentModule('newproduct')" class="btn btn-primary">Создать продукт</a>
            </div>

            <div class="panel-body">
              <div class="row panel-subheading">
                <div class="col-md-4">
                  <h4>
                    Продукты
                  </h4>
                  <search v-model="searchQuery" v-on:input="textSearch"></search>
                </div>
                <div class="col-md-8 text-right">
                  <ul class="list-inline">
                    <li>
                      <div>
                        <multiselect v-model="categoriesParams"
                        select-label=""
                        track-by="id"
                        label="name"
                        :options="categoriesOptions"
                        :multiple="true"
                        :close-on-select="false"
                        :hide-selected="true"
                        :searchable="false"
                        @input = "getProducts()"
                        placeholder="Категории">
                        <template slot="tag" scope="props">
                          <span class="custom__tag">
                            <span>{{ props.option.name }}</span>
                            <span class="custom__remove" @click="props.remove(props.option)">
                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </span>
                          </span>
                        </template>
                        </multiselect>
                      </div>
                    </li>
                    <li>
                      <div><orderby v-model="orderByParams" :init-data="orderByParams"></orderby></div>
                    </li>
                  </ul>
                </div>
              </div>
              <product v-for="product in products"
              :product="product"
              :key="product.id"
              v-on:productDeleted="getProducts"
              v-on:editProduct="setEditedProductId"></product>
              
            </div>

            <div class="panel-footer">
              <paginator v-if="meta && products.length" for="products" :pagination="meta.pagination" v-on:products_pageChanged="getProducts"></paginator>
            </div>

          </div>
        </div>
      </div>
      
    </div>
  </div>
</template>

<script src="./products.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
