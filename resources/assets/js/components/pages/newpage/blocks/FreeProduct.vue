<template>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Заголовок..." v-model="params.title">
            </div>
        </div>
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
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Токен GR кампании..." v-model="params.campaignToken">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" v-model="params.noPhone">
                <label class="form-check-label">
                    Не запрашивать телефон
                </label>
            </div>
        </div>
    </div>
</template>

<script src="./freeproduct.js"></script>