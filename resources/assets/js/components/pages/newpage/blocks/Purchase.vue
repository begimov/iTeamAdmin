<template>
    <multiselect v-model="params.product"
        :options="options.products"
        select-label=""
        selected-label="Выбран"
        deselect-label=""
        placeholder="Выберите продукт"
        label="name"
        track-by="id">
        <span slot="noResult">Продукт не найден</span>
    </multiselect>
</template>

<script src="./purchase.js"></script>