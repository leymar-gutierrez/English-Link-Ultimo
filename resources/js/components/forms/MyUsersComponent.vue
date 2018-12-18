<template>
      <div class="container">
          <div class="row justify-content-center">
              <div class="">
                  <div>

<!-- Crea Usuario  -->
<form-component @new="addUser"></form-component>


<!-- Seach -->
<div class="col-12 stretch-card ">
      <div class="card pl-2 pr-2">
            <div class="container mb-2 mt-4">
                  <input class="form-control" type="text" placeholder="Buscar" v-model="name">
                  <span class="help is-dark pl-2"><strong>{{searchUser.length}}</strong> de {{users.length}} estudiantes encontrados</span>
            </div>
      </div>
</div>



<!-- Table -->
<div class="col-lg-12 grid-margin stretch-card">
 <div class="card">
    <div class="card-body">
      <h3 class="">Estudiantes</h3>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                Nombre
              </th>
              <th>
                Apellido
              </th>
              <th>
                Dni
              </th>
              <th>
                Email
              </th>
              <th>
                Password
              </th>
            </tr>
          </thead>
          <tbody>
                <!-- User -->
                <user-component v-for="(user, index) in searchUser" :key="user.id" :user="user" @update="updateUser(index, ...arguments) "@delete="deleteUser(index)"></user-component>
                <!-- User End -->
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
                        users: [],
                        name: '',
           }
     },
        mounted() {
                  axios.get('/users').then((response) => {
                  this.users = response.data;
            })
      },
      methods: {
            addUser(user) {
                  this.users.push(user);
            },
            updateUser(index, user){
                  this.users[index] = user;
                  Swal('Usuario editado correctamente!','You clicked the button!','success');
            },
            deleteUser(index){
                  this.users.splice(index, 1);

            },

      },
      computed: {
            searchUser(users) {

                  return this.users.filter((user) => {
                        var fullname = user.first_name + ' ' + user.last_name;
                        return fullname.toLowerCase().match(this.name.toLowerCase())
                  });

            },
      }
}

</script>
