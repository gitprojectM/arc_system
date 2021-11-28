<template>
<div class=" shadow-0 ">
  <div class=""><h5 class=" ">Review Programs</h5></div>
  <div class="card-body">
 
        <div id="PForm" class="row">
                <div class="col-3 col-lg-3 col-sm-3  shadow p-3 mb-5 bg-body rounded">
                 <h5 class=" "></h5>
                    <form  @submit.prevent="updateProgram(prog.id)" v-if="prog.id != null">
                       
                        <!-- title input -->
                        
                        <div class="" >
                           
                              <label class="form-label" for="course">coures</label>
                         <select class="form-select" v-model="prog.course_id" placeholder="Select Course" required>
                                
                                 
                                <option v-for="course in courses" :key="course.id" v-bind:value="course.id"> 
                                {{ course.title}}</option>
                            </select>
                         
  
                        </div>
                       

                       
              <!-- review type -->
                        <div class=" ">
                             <label class="form-label" for="Review Type">Review Type</label>
                            <input type="text" id="" class="form-control" v-model="prog.review_type"  required/>
                           
                        </div>

                      
                        <!--promo input -->
                        <div class=" ">
                             <label class="form-label" for="Promo">Promo</label>
                            <input type="text" id="" class="form-control" v-model="prog.promo" required />
                           
                        </div>
                         <!-- price input -->
                        <div class="  mb-4">
                             <label class="form-label" for="Price">Price</label>
                            <input type="number" id="" min="1"  max="1000000" class="form-control" v-model="prog.price" required />
                           
                        </div>
                         
                        <!-- Submit button -->
                        <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary mb-4">Update</button>
                        </div>
                       
                        </form>
                          <form @submit.prevent="  addprogram()" v-else>
                         <div class="" >
                           
                              <label class="form-label" for="course">coures</label>
                         <select class="form-select" v-model="programs.course_id" placeholder="Select Course" required>
                           
                                <option v-for="course in courses" :key="course.id" v-bind:value="course.id"> 
                                {{ course.title}}</option>
                            </select>
                         
  
                        </div>
                       

                       
              <!-- review type -->
                        <div class="  ">
                             <label class="form-label" for="Review Type">Review Type</label>
                            <input type="text" id="" class="form-control" v-model="programs.review_type" required />
                           
                        </div>

                      
                        <!--promo input -->
                        <div class="  ">
                             <label class="form-label" for="Promo">Promo</label>
                            <input type="text" id="" class="form-control" v-model="programs.promo"  required/>
                           
                        </div>
                         <!-- price input -->
                        <div class="  mb-4">  
                             <label class="form-label" for="Price">Price</label>
                            <input type="number" min="1" max="100000" class="form-control" v-model="programs.price" required />
                           
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
                        <th>Review Type</th>
                        <th>Promo</th>
                        <th>Price</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="review in reviews" :key="review.id">
                        <td>{{ review.id }}</td>
                        <td>{{review.course.title}}</td>
                        <td>{{ review.review_type }}</td>
                        
                        <td>{{ review.promo }}</td>
                        <td>{{ review.price }}</td>
                        <td><div class="btn-group" role="group">
                        
                        <button class="btn btn-primary" @click="editProgram(review.id) ">edit</button>
                        <button class="btn btn-danger" @click="deleteProgram(review.id)">Delete</button>
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
 import Multiselect from '@vueform/multiselect'
export default {
     components: {
    Multiselect
  },
  
    data() {
        return {
            programs: { },
            reviews: [],
            courses: [],
            prog:{},
        
           
        }
    },
    mounted(){
    this.fetchTasks()
       
                       
            
                          
     
  },
  created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('api/programs/course')
                .then(response => {
                    this.courses = response.data;
                    console.log(this.courses);
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
        
    },
    
    methods: {
         fetchTasks() {
    axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get('api/programs')
                .then(response => {
                       this.reviews = response.data;
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
                  
        addprogram() {
           var _this = this;
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/programs/add ', this.programs)
                    .then(response => {   
                    //this.$router.push({name: 'program'})
                    this. programs = {'course_id': '','review_type': '','promo': '','price': ''}
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
        deleteProgram(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/programs/delete/${id}`)
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

        editProgram(id){
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`api/programs/edit/${id}`)
                .then(response => {
                 
                    this.prog = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
        },
         updateProgram(id) {
             //this.programs.id = id;
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/programs/update/${id}`,this.prog)
                    .then(response => {
                        this. prog = {'course_id': '','review_type': '','promo': '','price': ''}
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
<style src="@vueform/multiselect/themes/default.css"></style>