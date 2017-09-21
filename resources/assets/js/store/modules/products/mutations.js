export default {
  setProducts (state, products) {
    console.log(products);
    state.products = products.data
    state.meta = products.meta
  },
  setLoadingProducts (state, flag) {
    state.isLoadingProducts = flag
  }
}
