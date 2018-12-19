<template>
 <div class="">
       <select class="" name="teacherid" v-model="course" @change=CourseData>
             <option value="0"></option>
             <option v-for="(course, index) in courses" v-bind:value='course.id' >{{ course.name }}</option>
       </select>


       <div v-if="course">
         <p>{{ coursedata.id }}</p>
         <p>{{ coursedata.name }}</p>
         <p>{{ coursedata.description }}</p>
       </div>


       <!-- Lista de Correos a añadir como alumnos  -->
       <div v-if="coursedata">
       <div class="row">
         <div class="col-sm-6">
             <h2>Agregar Alumnos</h2>
             <small>Escribe el email de los alumnos a agregar en este curso</small>
             <input type="text" class="form-control" v-model="newEmailUser" v-on:keyup.enter="addEmail" placeholder="Email">
             <br>
             <button type="submit" class="btn btn-primary btn-sm" name="button" v-on:click="addEmail">Agregar</button>
             <button type="submit" class="btn btn-primary btn-sm" name="button" v-on:click="createAccounts">Cuentas Cuentas</button>
         </div>
         <div class="col-sm-6">
             <h2 v-if="lists.length > 0">Lista de Alumnos</h2>
             <ul class="list-group">
               <li class="list-group-item"
                   v-for="item in lists">
                 {{ item }}
               </li>
             </ul>
         </div>
       </div>
       </div>




 </div>
</template>

<script>
    export default {
             data() {
                  return {
                        course: '',
                        courses: [],
                        coursedata: '',
                        name: '',
                        lists: [],
                        newEmailUser: ''
           }
     },
        mounted() {
                  axios.get('/courses').then((response) => {
                  this.courses = response.data;
                  })

      },
      methods: {
            CourseData(){
                  axios.get(`/courses/${this.course}`).then((response) => {
                  this.coursedata = response.data;
            })
      },
            addEmail() {
                  this.lists.push(this.newEmailUser);
                  this.newEmailUser = '' ;
            },
            createAccounts() {
                  // Swat2
                  Swal({
                    title: 'Estas seguro que desea añadir los siguientes usuarios?',
                    text: this.lists.join(' , '),
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, quiero agregarlos!',
                    cancelButtonText: 'No, cancelar'
                  }).then((result) => {
                        // Si acepta
                    if (result.value) {
                         const params = {
                             lists : this.lists,
                             course : this.course
                       }
                        axios.post('api/addusercouse', params).then((response) => {
                             Swal('Usuarios agregados!','You clicked the button!','success');
                       }).catch(function (error) {
                             Swal('Error al agregar usuarios!','You clicked the button!','error');
                       });

                      // Si no acepta
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                      Swal('Cancelado','Los usuarios no se han agregado','error')
                    }
                  })
            },


      },
      computed: {

      }
}



</script>
