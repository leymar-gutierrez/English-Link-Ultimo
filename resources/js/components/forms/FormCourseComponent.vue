<template>
      <div class="col-12 stretch-card ">
      <div class="card pt-4 pb-4 pl-4">
          <form class="form-inline row" v-on:submit.prevent="newCourse()">
                <div class="col-2 form-group">
                 <label for="name" class="">Nombre</label>
                 <input type="text"  class="form-control" id="name" name="name" value="" v-model="name">
               </div>
                <div class="col-2 form-group">
                 <label for="desctiption" class="">Description</label>
                 <input type="text" class="form-control" id="description" name="description" v-model="description">
               </div>
                <div class="col-2 form-group">
                 <label for="price" class="">Precio</label>
                 <input type="number" class="form-control" id="price" name="price" v-model="price">
               </div>
                <div class="col-2 form-group">
                 <label for="price" class="">Profesor</label>
                 <select class="" name="teacherid" v-model="teacherid">
                       <option v-for="(teacher, index) in teachers" v-bind:value='teacher.id' >{{ teacher.first_name }}</option>
                 </select>
               </div>
              <div class="col">
              <button type="submit" class="form-control btn btn-primary">Agregar Curso</button>
              </div>
            </form>
    </div>
    </div>
    </div>
</template>

<script>
    export default {
       data() {
             return {
                   name: '',
                   description: '',
                   price: '',
                   teacherid:'',
                   teachers: ''
             }
      },
        mounted() {

             axios.get('/teachers').then((response) => {
                  this.teachers = response.data;
                  console.log(this.teachers)
            }).catch(function (error) {
                  Swal('Error al cargar profesores!','You clicked the button!','error');
});
      },

       methods: {
             newCourse() {
                   const params = {
                        name: this.name,
                        price : this.price,
                        description : this.description,
                        teacherid: this.teacherid

                  }
                   axios.post('/courses', params).then((response) => {
                        const course = response.data;
                        this.$emit('new', course);

                        Swal('Usuario agregado!','You clicked the button!','success');
                  }).catch(function (error) {
                        Swal('Error al agregar usuario!','You clicked the button!','error');
  });
             },
       }
    }
</script>
