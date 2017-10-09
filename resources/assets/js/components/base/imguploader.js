import uploadMixin from './mixins/upload'
export default {
  props: [
    'currentImg'
  ],
  data () {
    return {
      errors: [],
      img: {
        id: null,
        path: this.currentImg
      }
    }
  },
  mixins: [
    uploadMixin
  ],
  methods: {
    fileChange (e) {
      this.upload(e)
      // .then(res => {
      //   this.img.path = res.data.data.path
      //   this.img.id = res.data.data.id
      // }).catch(err => {
      //   if (err.response.status === 422) {
      //     this.errors = err.response.data
      //     return
      //   }
      //   this.errors = 'Error occurred while processing your img, please try again'
      // })
      this.img.path = 'img/test.png'
      this.$emit('input', this.img.path)
    }
  },
  mounted () {
    console.log(this);
  }
}
