<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row" v-for="(stage, index) in params.stages" :key="index">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">{{ 'Этап ' + (index + 1) }}</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Название этапа / МК</label>
                                <input type="text" v-model="stage.name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Описание этапа / МК</label>
                                <textarea cols="30" rows="10" v-model="stage.description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="panel-footer"><a href="#" class="btn btn-default" @click.prevent="removeStage">Удалить этап</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-default" @click.prevent="addStage">Добавить этап</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./mpstages.js"></script>