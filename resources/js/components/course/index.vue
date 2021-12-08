<template>
<div class=" shadow-0 ">
  <div class=""><h5 class=" ">Review Programs</h5></div>
  <div class="card-body">
 
        <div id="PForm" class="row">
                <div class="col-3 col-lg-3 col-sm-3  shadow p-3 mb-5 bg-body rounded">
                 <h5 class=" "></h5>
                    <form  @submit.prevent="updateCourse(cou.id)" v-if="cou.id != null">
                       
                     
                        <div class=" mb-4">
                             <label class="form-label" for="Review Type">Review Type</label>
                            <input type="text" id="" class="form-control" v-model="cou.title"  required/>
                           
                        </div>

                      
                        
                       
                         
                        <!-- Submit button -->
                        <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary mb-4">Update</button>
                        </div>
                       
                        </form>
                          <form @submit.prevent="  addcourse()" v-else>
             
                           
                              <div class=" mb-4">
                             <label class="form-label" for="Review Type">Review Type</label>
                            <input type="text" id="" class="form-control" v-model="cors.title"  required/>
                           
                        </div>
                        <!-- Submit button -->
                        <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary mb-4">Submit</button>
                        </div>
                       
                        </form>
                </div>
                <div class="col-9 col-lg-9 col-sm-9  shadow-1 shadow p-3 mb-5 bg-body rounded">
                      
                    <table class="table " style="width:100%" id="example" > 
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>Course</th>
                        <th>Action</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="course in courses" :key="course.id">
                        <td>{{ course.id }}</td>
                        <td>{{course.title}}</td>
                        
                        
                     
                        <td><div class="btn-group" role="group">
                        
                        <button class="btn btn-primary" @click="editcourse(course.id) ">edit</button>
                        <button class="btn btn-danger" @click="deletecourse(course.id)">Delete</button>
                    </div>
                    </td>
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
            courses: { },
            cors: {},
           
            cou:{},
        
           
        }
    },
    mounted(){
    this.fetchTasks()
       
                       
            
                          
     
  },
  
    
    methods: {
         fetchTasks() {
    axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get('api/courses')
                .then(response => {
                       this.courses = response.data;
                        //this.$router.push({name: 'program'})
                       $(document).ready( function () {
                       $('#example').DataTable({ "order": [[ 0, 'desc' ]]});
                            
                          });
                       
                   
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
        
    },
                  
        addcourse() {
           var _this = this;
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/courses/add ', this.cors)
                    .then(response => {   
                    //this.$router.push({name: 'program'})
                    this. cors = {'title': ''}
                    this.fetchTasks()
                   // this.$router.push({name: 'program'})
                    //  $(document).ready( function () {
                    //      $('#example').DataTable();
                       
                    //       }); 
                     $('#example').DataTable().destroy();
                    
                          
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        },
        deletecourse(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/courses/delete/${id}`)
                    .then(response => {
                        //let i = this.program.map(item => item.id).indexOf(id); // find index of your object
                        //this.program.splice(i, 1)
                          this.fetchTasks()
                     $('#example').DataTable().destroy();
                    

                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        },

        editcourse(id){
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`api/courses/edit/${id}`)
                .then(response => {
                 
                    this.cou = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
        },
         updateCourse(id) {
             //this.programs.id = id;
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/courses/update/${id}`,this.cou)
                    .then(response => {
                        this.cou = {'title': ''}
                        this.fetchTasks()
                        //this.$router.push({name: 'books'});
                         $('#example').DataTable().destroy();
                    
                          
                
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
