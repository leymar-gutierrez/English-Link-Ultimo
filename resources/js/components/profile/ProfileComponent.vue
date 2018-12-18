<template>

             <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editar Perfil</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Informacion Personal 
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nombre</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" v-model="user.first_name" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Apellido</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" v-model="user.last_name"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                              <label class="col-sm-3 col-form-label" >DNI</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" disabled v-model="user.dni"/>
                              </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Fecha de cumpleaños</label>
                          <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                              <label class="col-sm-3 col-form-label" >Email</label>
                              <div class="col-sm-9">
                                <input type="email" class="form-control" v-model="user.email"/>
                              </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Fecha de cumpleaños</label>
                          <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description">
                      Dirección
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Calle</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Localidad</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <button name="button" class="btn btn-success" @click.prevent="onClickUpdate()">Guardar</button>


                  </form>
                </div>
              </div>
            </div>


</template>

<script>
    export default {
          props: ['user'],
          data(){
                return {
                      first_name : this.user.first_name,
                      last_name : this.user.last_name,
                      email : this.user.email,
                      dni : this.user.dni,
                }
          },
        mounted() {
      },
      methods: {
            onClickUpdate() {
                  const params = {
                        id : this.user.id,
                        first_name : this.user.first_name,
                        last_name : this.user.last_name,
                        email : this.user.email,
                        dni : this.user.dni
                  }
                  axios.put(`/users/${this.user.id}`, params).then((response) => {
                        const user = response.data;
                        Swal('Informacion actualizada!','You clicked the button!','success');
                  });

            }
      }
    }
</script>
