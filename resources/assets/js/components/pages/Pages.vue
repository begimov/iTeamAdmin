<template>
  <div>
    <new-page v-if="currentModule === 'newpage'" v-on:cancelNewPage="cancelNewPage" :editedPageId="editedPageId"></new-page>
    <div class="container" v-if="currentModule === 'pages'">
      <div class="row">
        <div class="col-md-12">
          <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <a href="#" @click.prevent="setCurrentModule('newpage')" class="btn btn-primary">Создать страницу</a>
            </div>

            <div class="panel-body">
              <div class="row panel-subheading">
                <div class="col-md-4">
                  <h4>
                    Страницы
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
                        @input = "getPages()"
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
                      <div>
                        <multiselect v-model="themesParams"
                        select-label=""
                        track-by="id"
                        label="name"
                        :options="themesOptions"
                        :multiple="true"
                        :close-on-select="false"
                        :hide-selected="true"
                        :searchable="false"
                        @input = "getPages()"
                        placeholder="Темы">
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
              <page v-for="page in pages"
              :page="page"
              :key="page.id"
              v-on:pageStatusChanged="getPages"
              v-on:editPage="setEditedPageId"></page>

            </div>

            <div class="panel-footer">
              <paginator v-if="meta && pages.length" for="pages" :pagination="meta.pagination" v-on:pages_pageChanged="getPages"></paginator>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./pages.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
