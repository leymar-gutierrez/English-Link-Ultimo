<template>
      <div class="container">
          <div class="row justify-content-center">
              <div class="">
                  <div>

<!-- Crea Usuario  -->
<teacher-form-component @new="addTeacher"></teacher-form-component>




<!-- Seach -->
<div class="col-12 stretch-card ">
<div class="card pl-2 pr-2">
<div class="container mb-2 mt-4">
      <input class="form-control" type="text" placeholder="Buscar" v-model="name">
      <span class="help is-dark pl-2"><strong>{{searchTeacher.length}}</strong> de {{teachers.length}} encontrados</span>
</div>
</div>
</div>





<!-- Table -->
<div class="col-lg-12 grid-margin stretch-card">
 <div class="card">
    <div class="card-body">
      <h3 class="">Profesores</h3>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Dni</th>
              <th>Email</th>
              <th>Password</th>
            </tr>
          </thead>
          <tbody>
                <!-- teacher -->
                <teacher-component v-for="(teacher, index) in searchTeacher" :key="teacher.id" :teacher="teacher" @update="updateTeacher(index, ...arguments) "@delete="deleteTeacher(index)"></teacher-component>
                <!-- teacher End -->

          </tbody>
        </table>
      </div>
    </div>
 </div>
</div>























                      </div>
                  </div>
              </div>
          </div>
      </div>
</template>

<script>
    export default {
             data() {
                  return {
                        teachers: [],
                        name: '',
           }
     },
        mounted() {
                  axios.get('/teachers').then((response) => {
                  this.teachers = response.data;
            })
      },
      methods: {
            addTeacher(teacher) {
                  this.teachers.push(teacher);
            },
            updateTeacher(index, teacher){
                  this.teachers[index] = teacher;
                  Swal('Usuario editado correctamente!','You clicked the button!','success');
            },
            deleteTeacher(index){
                  this.teachers.splice(index, 1);
            },

      },
      computed: {
            searchTeacher(teachers) {

                  return this.teachers.filter((teacher) => {
                        var fullname = teacher.first_name + ' ' + teacher.last_name;
                        return fullname.toLowerCase().match(this.name.toLowerCase())
                  });

            },
      }
}

</script>
