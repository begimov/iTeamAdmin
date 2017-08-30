<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <new-order v-if="flags.neworder" v-on:cancelOrder="flags.neworder = false"></new-order>
            <a href="#" class="btn btn-primary" v-else @click.prevent="flags.neworder = true">Создать заказ</a>
          </div>

          <div class="panel-body">
            <div class="row panel-subheading">
              <div class="col-md-6">
                <strong>Сумма:</strong> 75751.5 <strong>Период поиска:</strong> 29.08.2014 - 29.08.2017
              </div>
              <div class="col-md-6 text-right">
                <ul class="list-inline">
                  <li><a href="#" @click.prevent="setIdFilter"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>
                </ul>

              </div>
            </div>

            <div v-for="order in orders">

              <div class="row panel-row">

                <div class="col-md-6">
                  <p>
                    <h4>
                      Артём ООО Торгсервис
                      <small>
                        <a href="mailto:">
                          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> smyshnova@yahoo.com
                        </a>
                        <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> +79190442550
                      </small>
                    </h4>
                  </p>
                  <p><span class="badge">Заказ № {{ order.id }}:</span> <small>&laquo;Как улучшить бизнес-процессы компании&raquo;</small></p>
                  <p>
                    <span class="badge">
                      4000&nbsp;&#8381;
                    </span>
                    <small>
                      Робокасса
                      <span class="label label-success">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Оплачен 30 ноября в 12:35
                      </span>
                    </small>
                  </p>
                </div>

                <div class="col-md-6 text-right orders-edit-block">
                  <ul class="list-inline">
                    <li><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать</a></li>
                    <li>
                      <select>
                        <option>Оплачен</option>
                        <option>Ждет оплаты</option>
                      </select>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Удалить</a></li>
                  </ul>
                </div>

              </div>

            </div>

          </div>

          <div class="panel-footer">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="disabled">
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script src="./orders.js"></script>
