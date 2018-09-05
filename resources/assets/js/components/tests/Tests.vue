<template>
  <div>
    <new-test v-if="currentModule === 'newtest'" v-on:cancelNewTest="cancelNewTest" :editedTestId="editedTestId"></new-test>
    <div class="container" v-if="currentModule === 'tests'">
      <div class="row">
        <div class="col-md-12">
          <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <a href="#" @click.prevent="setCurrentModule('newtest')" class="btn btn-primary">Создать тест</a>
            </div>

            <div class="panel-body">
              <div class="row panel-subheading">
                <div class="col-md-4">
                  <h4>
                    Тесты
                  </h4>
                  <search v-model="searchQuery" v-on:input="textSearch"></search>
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
              <iteam-test v-for="test in tests"
              :test="test"
              :key="test.id"></iteam-test>

            </div>

            <div class="panel-footer">
              <paginator v-if="meta && tests.length" for="tests" :pagination="meta.pagination" v-on:tests_pageChanged="getTests"></paginator>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./tests.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
