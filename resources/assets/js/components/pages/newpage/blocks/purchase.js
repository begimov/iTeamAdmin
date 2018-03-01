export default {
    mounted() {
        this.$emit('input', {
            productId: 1,
            pricetagId: 2
        })
    }
}