export default {
    props: ['stages'],
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
        },
        stages: {
            handler: function(stages) {
                if (!this.params.stages.length) {
                    this.params.stages = stages
                }
            }
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