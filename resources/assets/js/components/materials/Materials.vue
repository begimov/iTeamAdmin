<template>
  <div>
    <new-material v-if="currentModule === 'newmaterial'" 
      v-on:cancelNewPage="cancelNewPage"
      :editedPageId="editedPageId"></new-material>
    <div class="container" v-if="currentModule === 'materials'">
      <div class="row">
        <div class="col-md-12">
          <!-- <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div> -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <!-- <a href="#" @click.prevent="setCurrentModule('newpage')" class="btn btn-primary">Создать материал</a> -->
            </div>

            <div class="panel-body">
              <div class="row panel-subheading">
                <div class="col-md-4">
                  <h4>
                    Материалы
                  </h4>
                  <!-- <search v-model="searchQuery" v-on:input="textSearch"></search> -->
                </div>
                <div class="col-md-8 text-right">
                  <ul class="list-inline">
                    <li>
                      <div>
                        &nbsp;
                      </div>
                    </li>
                    <li>
                      <div>
                        &nbsp;
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- <page v-for="page in pages"
              :page="page"
              :key="page.id"
              v-on:pageStatusChanged="getPages"
              v-on:editPage="setEditedPageId"></page> -->

            </div>

            <!-- <div class="panel-footer">
              <paginator v-if="meta && pages.length" for="pages" :pagination="meta.pagination" v-on:pages_pageChanged="getPages"></paginator>
            </div> -->

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./materials.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
