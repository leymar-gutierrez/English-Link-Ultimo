<template>
   <select class="" name="">
         <option value="" ></option>
   </select>
</template>

<script>
    export default {
       data() {
             return {
                   first_name: '',
                   last_name: '',
                   password: '',
                   dni: '',
                   email: ''
             }
      },
        mounted() {
            console.log('Component mounted. 2')
      },
       methods: {
             newUser() {
                   const params = {
                        first_name : this.first_name,
                        last_name : this.last_name,
                        email : this.email,
                        password : this.password,
                        dni : this.dni
                  }
                   axios.post('/users', params).then((response) => {
                        const user = response.data;
                        this.$emit('new', user);

                        Swal('Usuario agregado!','You clicked the button!','success');
                  }).catch(function (error) {
                        Swal('Error al agregar usuario!','You clicked the button!','error');
  });
             },
       }
    }
</script>
