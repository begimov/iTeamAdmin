export default {
    setMaterialId (state, id) {
        state.params.id = id
    },
    updateName (state, value) {
        state.params.name = value
    },
    setIsLoading (state, value) {
        state.isLoading = value
    },
}
