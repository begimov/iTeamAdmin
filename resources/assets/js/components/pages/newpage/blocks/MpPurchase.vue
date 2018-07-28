<template>
    <div class="row">
        <div class="col-md-12">
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
    </div>
</template>

<script src="./mppurchase.js"></script>