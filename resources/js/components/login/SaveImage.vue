<template>
      <div class="col-12">
            <div class="card">
             <div class="card-body col-6">
            <h2 class="card-title">Editar Perfil</h2>
            <p class="card-description">
              Foto de perfil
            </p>
            <img :src="avatar" alt="image" width="100px">
        <input type="file" class="form-control file-upload-info mt-2" name="image" @change="GetImage" accept="image/*">
        <a href="#" v-if="loaded" class="btn file-upload-browse btn btn-info" @click.prevent="upload">Upload</a>
        <a href="#" v-if="loaded" class="btn btn-danger" @click.prevent="cancel">Cancel</a>

    </div>
    </div>
    </div>


</template>



<script>
    export default {
        props: ['user'],
        data(){
          return {
              image:'',
              avatar: `storage/users/${this.user.image_id}`,
              loaded: false,
              file: null
          }
        },
      //   mounted(){
      //        if(!this.image){
      //              avatar: `store/default.png`
      //        }
      // },

        methods: {
          GetImage(image) {
            var image = image.target.files[0];
console.log(image)
            var reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = image => {
            this.avatar = image.target.result
            }
            this.loaded = true;
            var form = new FormData();
            form.append('image', image);
            this.file = form
            console.log(form)
          },
          cancel() {
            this.avatar = this.user.avatar;
            this.loaded = false;
            Swal('Cancel','You clicked the button!','error');
          },
          upload() {
            axios.post('/saveImage', this.file)
            Swal('Imagen cargada!','You clicked the button!','success');
            this.loaded = false;
          }
        }
    }
</script>
