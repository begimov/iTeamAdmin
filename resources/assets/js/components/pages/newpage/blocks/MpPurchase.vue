<template>
    <div class="row">
        <div class="col-md-12" v-for="(product, index) in params.products" :key="product.id">
            <purchase v-model="params.products[index]" :product="product"/>
        </div>
    </div>
</template>

<script src="./mppurchase.js"></script>