<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4>Новый тест</h4>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <multiselect :value="typeParams"
                    :options="typeOptions"
                    v-on:input="updateTypeParams"
                    select-label=""
                    selected-label="Выбран"
                    deselect-label=""
                    placeholder="Выберите тип"
                    label="name"
                    track-by="id">
                    <span slot="noResult">Тип не найден</span>
                  </multiselect>
                  <span class="help-block alert-danger" v-if="errors.test_type_id">{{ errors.test_type_id[0] }}</span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Введите название теста..." v-model="testName">
                  <span class="help-block alert-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" placeholder="Введите описание теста..." v-model="testDesc" cols="30" rows="4"></textarea>
                </div>
              </div>
            </div>

          </div>

          <div class="panel-body">
            <div class="row" v-for="(question, index) in questions" :key="index">
              <question v-model="questions[index]" :index="index" @removeQuestion="removeQuestion"/>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-default" @click.prevent="addQuestion">Добавить вопрос</a>
                </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <h3><span class="label label-default">Всего очков: {{ totalScore }}</span></h3>
              </div>
            </div>
            <div class="row" v-for="(condition, index) in conditions" :key="index">
              <condition v-model="conditions[index]" />
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-default" @click.prevent="addCondition">Добавить условие</a>
                </div>
            </div>
            <hr>
            <div class="row">
              <test-certificate v-model="testCertificate" />
            </div>
          </div>

          <div class="panel-footer">
            <a href="#" class="btn btn-primary" @click.prevent="save" v-if="!editedTestId">Создать</a>
            <!-- <a href="#" class="btn btn-primary" @click.prevent="update(editedPageId)" v-else>Сохранить</a> -->
            <a href="#" class="btn btn-default" @click.prevent="cancel">Отменить</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./newtest.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
