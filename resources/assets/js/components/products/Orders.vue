<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-danger">
          <div class="panel-heading">Заказы</div>

          <div class="panel-body">
            <p v-for="order in orders">{{ order.id }} / {{ order.created_at }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['ordersProp'],
    data () {
      return {
        orders: this.ordersProp
      }
    },
    mounted() {
      console.log(this.orders);
    }
  }
</script>
