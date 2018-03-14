import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'

export default {
  components: {
    vueDropzone: vue2Dropzone
  },
  props: ['parentResourceId', 'parentResourceType', 'maxFiles'],
  data: function () {
    return {
      options: {
        url: `/webapi/files`,
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        maxFiles: this.maxFiles,
        headers: {
          'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        },
        addRemoveLinks: true,
        ...localizationRU,
      }
    }
  },
  methods: {
    fileUploaded(file, response) {
      file.id = response.id
      this.$emit('input', response.id)
    },
    fileRemoved(file, error, xhr) {
      axios.delete(`/webapi/files/${file.id}`)
      this.$emit('input', null)
    },
    fileSending(file, xhr, formData) {
      formData.set('parentResourceId', this.parentResourceId)
      formData.set('parentResourceType', this.parentResourceType)
    }
  }
}

const localizationRU = {
  dictDefaultMessage: 'Перенесите сюда файлы или кликните, чтобы их выбрать',
  dictFileTooBig: 'Слишком большой размер файла',
  dictResponseError: 'Ошибка, пожалуйста, повторите попытку позже',
  dictCancelUpload: 'Отменить',
  dictRemoveFile: 'Удалить',
  dictRemoveFileConfirmation: 'Вы уверены, что хотите удалить этот файл?',
}