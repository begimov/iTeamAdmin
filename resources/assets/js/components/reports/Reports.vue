<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
          <div class="panel panel-default">

            <div class="panel-body">
              <div class="row panel-subheading">
                <div class="col-md-12">
                  <h4>
                    Ежедневный отчет
                  </h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-body">
                      <h5>Число скачавших магнит</h5>
                      <h1 v-if="dailyReport">{{ dailyReport.magnetDownloads }}</h1>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-body">
                      <h5>Число нажавших кнопку «Получить» на странице трипваера</h5>
                      <h1 v-if="dailyReport">{{ dailyReport.tripwireOrders }}</h1>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-body">
                      <h5>Число купивших трипваер</h5>
                      <h1 v-if="dailyReport">{{ dailyReport.tripwirePurchases }}</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./reports.js"></script>