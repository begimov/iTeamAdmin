import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'

export default {
  components: {
    vueDropzone: vue2Dropzone
  },
  props: ['url'],
  data: function () {
    return {
      options: {
        url: this.url,
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        headers: {
          'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]')
        },
        addRemoveLinks: true,
      }
    }
  }
}