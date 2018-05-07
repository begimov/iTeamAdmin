export default {
    data() {
        return {
            params: {
                stages: [],
            },
        }
    },
    watch: {
        'params.stages': function (stages) {
            this.$emit('input', stages)
        }
    },
    methods: {
        //
    },
    mounted() {
        //
    }
}