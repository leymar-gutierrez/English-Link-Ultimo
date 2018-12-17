<template>
    <div class="container">
        <input type="file" name="image" @change="GetImage" accept="image/*">
        <img :src="avatar" alt="image" width="50%">
        <a href="#" v-if="loaded" class="btn btn-success" @click.prevent="upload">Upload</a>
        <a href="#" v-if="loaded" class="btn btn-danger" @click.prevent="cancel">Cancel</a>
    </div>


</template>



<script>
    export default {
        props: ['user'],
        data(){
          return {
              avatar: this.user.avatar,
              loaded: false
          }
        },

        methods: {
          GetImage(image) {
            var image = image.target.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = image => {
            this.avatar = image.target.result
            }
            this.loaded = true
          },
          cancel() {
            this.avatar = this.user.avatar;
            this.loaded = false;
            Swal('Cancel','You clicked the button!','error');
          },
          upload() {
            // axios.post('/users', {'image': this.avatar})
            Swal('Imagen cargada!','You clicked the button!','success');
          }
        }
    }
</script>
