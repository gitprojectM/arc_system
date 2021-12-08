<template>
<div class=" shadow-0 ">
  <div class=""><h5 class=" ">Users</h5></div>
  <div class="card-body">
 
        <div id="PForm" class="row">
               
                <div class=" shadow-1 shadow p-3 mb-5 bg-body rounded">
                      
                    <table class="table " style="width:100%" id="example" > 
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>role</th>
                       
                       
                        
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.id }}</td>
                        <td>{{ user.fname}} {{ user.lname}}</td>
                        <td>{{ user.email }}</td>
                        
                        
                        <td>{{user.role.role_name}}</td>
                       
                    </tr>
                       
                </tbody>
               
            </table> 
                </div>

        </div>
  </div>
</div>
</template>
<script>

export default {
   
  
    data() {
        return {
            users: { },
            
        
           
        }
    },
    mounted(){
    this.fetchTasks()
       
                       
            
                          
     
  },
 
    
    methods: {
         fetchTasks() {
    axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get('api/users')
                .then(response => {
                       this.users = response.data;
                        //this.$router.push({name: 'program'})
                       $(document).ready( function () {
                       $('#example').DataTable({ "order": [[ 0, 'desc' ]]});
                            
                          });
                       
                   
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
        
    }
                  
     
     


       
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
