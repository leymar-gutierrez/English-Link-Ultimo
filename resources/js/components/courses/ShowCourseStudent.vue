<template>
 <div class="">
       <select class="" v-model="course" @change="CourseData">
             <option v-for="(course, index) in courses" v-bind:value='course.id' >{{ course.name }}</option>
       </select>


       <div v-if="course">
         <p>{{ coursedata.id }}</p>
         <p>{{ coursedata.name }}</p>
         <p>{{ coursedata.description }}</p>
       </div>



       <div class="table-responsive">
         <table class="table table-striped">
           <thead>
             <tr>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Email</th>
               <th>DNI</th>

             </tr>
           </thead>
           <tbody>
                 <tr v-for="(user, index) in coursedata.users">
                 <td><p>{{ user.first_name }}</p></td>
                 <td><p>{{ user.last_name }}</p></td>
                 <td><p>{{ user.email }}</p></td>
                 <td><p>{{ user.dni }}</p></td>
               </tr>
           </tbody>
         </table>
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
           }
     },
        mounted() {
                  axios.get('/courses').then((response) => {
                  this.courses = response.data;
                  })

      },
      methods: {
            CourseData(){
                  const params = {
                     courseid : this.course,
                  }
                  axios.post(`/api/showcoursestudent`, params).then((response) => {
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
