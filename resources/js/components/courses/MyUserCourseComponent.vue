<template>
 <div class="">
       <select class="" name="teacherid" v-model="course" @change=CourseData>
             <option value="0"></option>
             <option v-for="(course, index) in courses" v-bind:value='course.id' >{{ course.name }}</option>
       </select>


       <div v-if="course">
         <p>{{ coursedata.name }}</p>
         <p>{{ coursedata.description }}</p>
       </div>


       <!-- Lista de Correos a añadir como alumnos  -->
       <div v-if="coursedata">
       <div class="row">
         <div class="col-sm-6">
             <h2>Agregar Alumnos</h2>
             <small>Escribe el email de los alumnos a agregar en este curso</small>
             <!-- CREO EL V-MODEL DE LA NUEVA TAREA, LE AGREGO EL METODO (V-ON:KEYUP.ENTER) PARA CUANDO HAGA ENTER -->
             <input type="text" class="form-control" v-model="newEmailUser" v-on:keyup.enter="addEmail" placeholder="Email">
             <br>
             <!-- AGREGO EL METODO (V-ON:CLICK) PARA CUANDO HAGA CLICK EN EL BOTON GUARDE LA INFORMACION -->
             <button type="submit" class="btn btn-primary btn-sm" name="button" v-on:click="addEmail">Agregar</button>
         </div>
         <div class="col-sm-6">
             <!-- SI EL ARRAY DE LISTS QUE ESTA EN LA INSTANCIA DE VUE TIENE UN ELEMENTO MUESTRA ESTO -->
             <h2 v-if="lists.length > 0">Lista de Alumnos</h2>
             <!-- SI EL ARRAY DE LISTS QUE ESTA EN LA INSTANCIA DE VUE NO TIENE ELEMENTOS MUESTRA ESTO -->
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


      },
      computed: {

      }
}

</script>
