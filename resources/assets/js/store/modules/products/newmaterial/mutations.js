export default {
    setMaterialId (state, id) {
        state.params.id = id
    },
    updateName (state, value) {
        state.params.name = value
    },
    updateVideoId (state, value) {
        state.options.video.identifier = value
    },
    addVideo (state) {
        const video = state.options.video
        if (video.identifier) {
            state.params.videos.push({ ...video })
            video.identifier = null
        }
    },
    removeVideo (state, index) {
        state.params.videos.splice(index, 1)
    },
    setIsLoading (state, value) {
        state.isLoading = value
    },
    setErrors(state, errors) {
        state.errors = errors
    },
    resetState(state) {
        const initialState = {
            options: {
                video: { id: null },
                files: []
              },
              params: {
                id: null,
                name: null,
                videos: []
              },
              isLoading: false,
              errors: {}
        }
        Object.keys(initialState).forEach(key => {
            state[key] = initialState[key]
        })
    },
    setMaterialToEdit(state, payload) {
        state.params.id = payload.id
        state.params.name = payload.name
        state.params.videos = payload.resources.data
    }
}
