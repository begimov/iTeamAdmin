<template>
  <div>
    <new-review v-if="currentModule === 'newreview'" v-on:cancelNewReview="cancelNewReview" :editedReviewId="editedReviewId"></new-review>
    <div class="container" v-if="currentModule === 'reviews'">
      <div class="row">
        <div class="col-md-12">
          <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <a href="#" @click.prevent="setCurrentModule('newreview')" class="btn btn-primary">Добавить отзыв</a>
            </div>

            <div class="panel-body">
              <div class="row panel-subheading">
                <div class="col-md-4">
                  <h4>
                    Отзывы
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
              <client-review v-for="review in reviews"
              :review="review"
              :key="review.id"></client-review>

            </div>

            <!-- <div class="panel-footer">
              <paginator v-if="meta && tests.length" for="tests" :pagination="meta.pagination" v-on:tests_pageChanged="getTests"></paginator>
            </div> -->

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./reviews.js"></script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>