export default {
    props: ['reviews'],
    data() {
        return {
            params: {
                reviews: [],
            },
        }
    },
    watch: {
        'params.reviews': {
            handler: function (reviews) {
                this.$emit('input', reviews);
            },
            deep: true
        },
        reviews: {
            handler: function(reviews) {
                if (!this.params.reviews.length) {
                    this.params.reviews = reviews
                }
            }
        }
    },
    methods: {
        addReview() {
            this.params.reviews.push({
                name: '',
                description: ''
            });
        },
        removeReview() {
            console.log('Removed');
        },
    },
    mounted() {
        //
    }
}