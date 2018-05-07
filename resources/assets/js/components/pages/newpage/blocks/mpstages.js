export default {
    data() {
        return {
            params: {
                stages: [
                    {
                        name: 'Name 1',
                        description: 'Desc 1'
                    },
                    {
                        name: 'Name 2',
                        description: 'Desc 2'
                    },
                ],
            },
        }
    },
    watch: {
        'params.stages': function (stages) {
            this.$emit('input', stages)
        }
    },
    methods: {
        addStage() {
            console.log('Added');
        }
    },
    mounted() {
        //
    }
}