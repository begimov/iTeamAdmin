export default {
  props : {
    endpoint: {
      type: String
    },
    sendAs: {
      type: String,
      default: 'file'
    }
  },
  data() {
    return {uploading: false}
  },
  methods : {
    upload (e) {
      this.uploading = true
      this.packageUploads(e)
      this.uploading = false
      // return axios.post(this.endpoint, this.packageUploads(e)).then(res => {
      //   this.uploading = false
      //   return Promise.resolve(res)
      // }).catch(err => {
      //   this.uploading = false
      //   return Promise.reject(err)
      // })
    },
    packageUploads (e) {
      let fileData = new FormData()
      fileData.append(this.sendAs, e.target.files[0])
      console.log(e.target.files[0]);
      return fileData
    }
  }
}
