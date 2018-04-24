export default {
    setMaterialId (state, id) {
        state.params.id = id
    },
    updateName (state, value) {
        state.params.name = value
    },
    updateVideoId (state, value) {
        state.options.video.id = value
    },
    addVideo (state) {
        const video = state.options.video
        if (video.id) {
            state.params.videos.push({ ...video })
            video.id = null
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
    }
}
