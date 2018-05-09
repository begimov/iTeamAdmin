export default {
  setProducts (state, products) {
    state.products = products.data
    state.meta = products.meta
  },
  setIsLoading (state, flag) {
    state.isLoading = flag
  },
  updateSearchQuery (state, value) {
      state.params.searchQuery = value
  },
  setCurrentModule (state, value) {
    state.currentModule = value
  },
  setProductToEdit (state, payload) {
    state.editProduct = {
      name: 'MK to edit',
      basePrice: "1000",
      category: {
        id:1,
        name: "Мастер-классы",
        parent_id: null,
        slug: "master-klassy"
      },
      materials: [
        {
          id:1,
          name: "МК 1 Материал 1",
          name: "Name"
        }
      ],
      priceTags: [
        {
          name: "Pricetag",
          price: "2000"
        }
      ]
    }
  },
}
