export default {
  pagename (state) {
    return state.page.name
  },
  pagedesc (state) {
    return state.page.desc
  },
  blocks (state) {
    return state.blocks
  },
  layout (state) {
    return state.layout
  },
  isLoading (state) {
    return state.isLoading
  },
}
