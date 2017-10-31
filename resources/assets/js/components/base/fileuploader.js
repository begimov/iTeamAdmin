import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'

export default {
  components: {
    vueDropzone: vue2Dropzone
  },
  props: ['resourceId'],
  data: function () {
    return {
      options: {
        url: `/webapi/files/${this.resourceId}/file`,
        thumbnailWidth: 150,
        maxFilesize: 0.5,
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
    },
    fileRemoved(file, error, xhr) {
      axios.delete(`/webapi/files/${this.resourceId}/file/${file.id}`)
    },
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