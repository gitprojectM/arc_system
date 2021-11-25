<template>
<div class="card border border-primary shadow-0 ">
  <div class="card-header"><h5 class=" ">Review Programs</h5></div>
  <div class="card-body">
 
        <div id="PForm" class="row">
                <div class="col-3 col-lg-3 col-sm-3 border-primary">
                 <h5 class=" "></h5>
                    <form @submit.prevent="addprogram">
                        <!-- title input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="" class="form-control" v-model="programs.title" />
                            <label class="form-label" for="course">Course</label>
                        </div>

                       
              <!-- review type -->
                        <div class="form-outline mb-4">
                            <input type="text" id="" class="form-control" v-model="programs.review_type" />
                            <label class="form-label" for="Review Type">Review Type</label>
                        </div>

                        <!-- year input-->
                        <div class="form-outline mb-4">
                            <input type="text" id="" class="form-control" v-model="programs.year" />
                            <label class="form-label" for="Year">Year</label>
                        </div>

                        <!--promo input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="" class="form-control" v-model="programs.promo" />
                            <label class="form-label" for="Promo">Promo</label>
                        </div>
                         <!-- price input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="" class="form-control" v-model="programs.price" />
                            <label class="form-label" for="Price">Price</label>
                        </div>
                         <div class=" mb-4">

                           <Multiselect
                                v-model="value"
                                mode="tags"
                                :closeOnSelect="false"
                                :searchable="true"
                                :createTag="true"
                                :options="[
                                    { value: 'batman', label: 'Batman' },
                                    { value: 'robin', label: 'Robin' },
                                    { value: 'joker', label: 'Joker' },
                                ]"
                                />
  
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                        </form>
                </div>
                <div class="col-9 col-lg-9 col-sm-9 border-primary shadow-0">
                      
                    <table class="table " style="width:100%" id="example" > 
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>Course</th>
                        <th>Review Type</th>
                        <th>Year</th>
                        <th>Promo</th>
                        <th>Price</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="review in reviews" :key="review.id">
                        <td>{{ review.id }}</td>
                        <td>{{ review.title }}</td>
                        <td>{{ review.review_type }}</td>
                        <td>{{ review.year }}</td>
                        <td>{{ review.promo }}</td>
                        <td>{{ review.price }}</td>
                        <td>dsfsdg </td>
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
        }
    },
    mounted(){
    this.fetchTasks()

  },
    methods: {
         fetchTasks() {
    axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get('api/programs')
                .then(response => {
                       this.reviews = response.data;
                        $(document).ready( function () {
              $('#example').DataTable();
            
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
                    this. programs = {'title': '','review_type': '','year': '','promo': '','price': ''}
                     this.fetchTasks() 
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        },
        
       
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