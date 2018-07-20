<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row" v-for="(review, index) in params.reviews" :key="index">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">{{ 'Отзыв ' + (index + 1) }}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-2">
                                     <file-uploader 
                                        v-model="review.files.avatar" 
                                        parent-resource-type="element"
                                        maxFiles="1"
                                        max-filesize=1>
                                    </file-uploader>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Имя</label>
                                        <input type="text" v-model="review.name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Отзыв</label>
                                        <quill-editor v-model="review.text"></quill-editor>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer"><a href="#" class="btn btn-default" @click.prevent="removeReview">Удалить отзыв</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-default" @click.prevent="addReview">Добавить отзыв</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./textreviews.js"></script>