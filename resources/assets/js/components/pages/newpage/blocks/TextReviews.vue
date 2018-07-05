<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row" v-for="(review, index) in params.reviews" :key="index">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">{{ 'Этап ' + (index + 1) }}</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Название этапа / МК</label>
                                <input type="text" v-model="review.name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Описание этапа / МК</label>
                                <quill-editor v-model="review.description"></quill-editor>
                            </div>
                        </div>
                        <div class="panel-footer"><a href="#" class="btn btn-default" @click.prevent="removeReview">Удалить этап</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-default" @click.prevent="addReview">Добавить этап</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./textreviews.js"></script>