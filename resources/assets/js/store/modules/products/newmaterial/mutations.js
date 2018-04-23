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
    setIsLoading (state, value) {
        state.isLoading = value
    },
}
