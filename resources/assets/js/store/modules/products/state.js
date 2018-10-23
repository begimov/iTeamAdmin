export default {
  currentModule: 'products',
  products: [],
  meta: null,
  isLoading: false,
  params: {
    searchQuery: '',
    categories: [],
    orderBy: {
      created_at: 'desc',
      id: ''
    },
    cost: null
  },
  options: {
    categories: [],
    cost: [
      { id:1, name: "Все"},
      { id:2, name: "Платные"},
      { id:3, name: "Бесплатные"}
    ]
  },
  editedProductId: null
}
