export default {
    data() {
        return {
            params: {
                stages: [],
            },
        }
    },
    watch: {
        'params.stages': {
            handler: function (stages) {
                this.$emit('input', stages);
            },
            deep: true
        }
    },
    methods: {
        addStage() {
            this.params.stages.push({
                name: '',
                description: ''
            });
        },
        removeStage() {
            console.log('Removed');
        },
    },
    mounted() {
        //
    }
}