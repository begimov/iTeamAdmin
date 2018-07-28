<template>
    <div>
        <div class="row">
            <div class="col-md-12" v-for="(product, index) in params.products" :key="product.id">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <purchase v-model="params.products[index]" :product="product"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="#" class="btn btn-default" @click.prevent="addProduct">Добавить продукт</a>
            </div>
        </div>
    </div>
</template>

<script src="./mppurchase.js"></script>