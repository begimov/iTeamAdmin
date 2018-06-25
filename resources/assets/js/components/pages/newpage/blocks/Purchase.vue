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
            <div class="form-check" style="margin:10px 0;">
                <input type="checkbox" v-model="params.isBundle" class="form-check-input">
                <label class="form-check-label">Возможность купить несколько штук</label>
            </div>
        </div>
        <div class="col-md-6">
            <template v-if="params.product && params.product.priceTags.data.length">
                <multiselect v-model="params.priceTag"
                    :options="params.product.priceTags.data"
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