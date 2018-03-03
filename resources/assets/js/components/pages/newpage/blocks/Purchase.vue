<template>
    <div class="row">
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
            <template v-if="params.product">
                <multiselect v-model="params.priceTag"
                    :options="params.product.priceTags"
                    select-label=""
                    selected-label="Выбран"
                    deselect-label=""
                    placeholder="Выберите ценник"
                    label="price"
                    track-by="id">
                    <span slot="noResult">Ценник не найден</span>
                </multiselect>
            </template>
        </div>
    </div>
</template>

<script src="./purchase.js"></script>