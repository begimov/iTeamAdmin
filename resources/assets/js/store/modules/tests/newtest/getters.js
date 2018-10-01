export default {
  testname (state) {
    return state.test.name
  },
  testdesc (state) {
    return state.test.desc
  },
  typeOptions (state) {
    return state.options.types
  },
  typeParams (state) {
    return state.test.type
  },
  isLoading (state) {
    return state.isLoading
  },
  questions (state) {
    return state.test.questions
  },
  conditions (state) {
    return state.test.conditions
  },
  certificate (state) {
    return state.test.certificate
  },
  totalScore (state) {
    const result = _.sum(_.flatten(_.map(state.test.questions, (q) => {
      return _.map(q.answers, (a) => {
        return parseInt(a.points)
      })
    })))
    return !result ? 'не для всех ответов введены кол-во очков' : result
  }
  // errors (state) {
  //   return state.errors
  // },
}
