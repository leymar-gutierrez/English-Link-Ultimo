<template lang="html">
  <div class="">
        <vue-avatar :width=400 :height=400 ref="vueavatar"
                  @vue-avatar-editor:image-ready="onImageReady" image="https://vuejs.org/images/logo.png">
     </vue-avatar>
     <br>
     <vue-avatar-scale ref="vueavatarscale" @vue-avatar-editor-scale:change-scale="onChangeScale"
      :width=250 :min=1 :max=3 :step=0.02 >
     </vue-avatar-scale>
     <br>
     <img src="" id="img-1">
     <button v-on:click="saveClicked">Click</button>
  </div>
</template>

<script>
import Vue from 'vue'
import VueAvatar from '../vue-avatar-editor/src/components/VueAvatar.vue'
import VueAvatarScale from '../vue-avatar-editor/src/components/VueAvatarScale.vue'
export default {

      components: {
          VueAvatar,
          VueAvatarScale
        },
        methods:{
          onChangeScale (scale) {
               console.log('hola')
              this.$refs.vueavatar.changeScale(scale)
          },
          saveClicked(){
            var img = this.$refs.vueavatar.getImageScaled()
            // use img
          },
          onImageReady(scale){
            this.$refs.vueavatarscale.setScale(scale)
          }
        }
}
</script>

<style lang="css">
</style>
