<template>
  <vue-dropzone
    id="dropedUserFiles"
    class="mb-6"
    :options="dropzoneOptions"
    :include-styling="false"
    :use-custom-slot=true
    v-on:vdropzone-file-added="returnFile"
  >
    <div class="dropzone border--text">
      <div class="dropzone-container border--text">
        <div class="dropzone--title border--text font-weight-regular">
          <IconImageUpload /> Drag and drop an image, video here or <span class="primary--text">choose image</span>
        </div>
      </div>
    </div>
  </vue-dropzone>
</template>

<script>
import VueDropzone from 'vue2-dropzone';
import IconImageUpload from '../components/icons/IconImageUpload';

export default {
  components: {
    VueDropzone,
    IconImageUpload,
  },

  data() {
    return {
      dropzoneOptions: {
        url: '/path/to/upload',
        createImageThumbnails: true,
        thumbnailWidth: 135,
        thumbnailHeight: 150,
        addRemoveLinks: false,
        maxFilesize: 2,
        previewTemplate: this.template(),
        acceptedFiles: 'image/*, video/*',
      },
      files: undefined,
    };
  },

  methods: {
    template() {
      return `<div class="dz-preview dz-file-preview">
        <div class="dz-details">
          <img class="border" data-dz-thumbnail />
          <div class="button--remove" data-dz-remove>
            <svg width="8" height="7" viewBox="0 0 8 7" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81342 0.846445L7.10562 0.200195L4.29953 2.76228L1.49344 0.200195L0.785645 0.846445L3.59174 3.40853L0.785645 5.97061L1.49344 6.61686L4.29953 4.05478L7.10562 6.61686L7.81342 5.97061L5.00733 3.40853L7.81342 0.846445Z" fill="#51575B" fill-opacity="0.6"/>
            </svg>
          </div>
        </div>
        <!--
          TODO when path too upload ready, customize error or success messages
          <div class="dz-error-message"><span data-dz-errormessage></span></div>
        -->
      </div>
        `;
    },
    returnFile(file) {
      console.dir(file);
    },
  },
};
</script>

<style
  lang="scss"
  scoped
>
.dropzone {
  border: 1px solid;
  border-radius: 10px;
  cursor: pointer;
  &-container {
    margin: 10px;
    padding: 10px 15px;
    border: 1px dashed;
    border-radius: 10px;
  }
  &--title {
    font-family: 'Lato', sans-serif;
    svg {
      height: 13px;
    }
  }
}
::v-deep {
  .dz-preview {
    display: inline-block;
    vertical-align: top;
    margin: 15px 12px 0px;
    @media screen and (max-width: 345px) {
      margin: 15px 2% 0px;
    }
    .dz-details {
      position: relative;
      img {
        border-radius: 5px;
        width: 135px;
        height: 155px;
      }
      .button--remove {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(255,255,255, 0.8);
        width: 25px;
        height: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        border-radius: 50%;
        svg {
          width: 11px;
          height: 10px;
        }
      }
    }
  }
}
</style>
