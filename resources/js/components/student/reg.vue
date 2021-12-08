<template>
    <section class="vh-100 gradient-custom">
       
                


  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
             <form @submit.prevent="register()">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text"  class="form-control form-control-lg" v-model="students.fname" />
                    <label class="form-label" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text"  class="form-control form-control-lg" v-model="students.lname" />
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>

                </div>
              </div>
                 <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text"  class="form-control form-control-lg" v-model="students.mname" />
                    <label class="form-label" for="middleName">Middle Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" class="form-control form-control-lg" v-model="students.suffix" />
                    <label class="form-label" for="suffix">Suffix</label>
                  </div>

                </div>
              </div>
           

              <div class="row">
             
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel"  class="form-control form-control-lg"   v-model="students.pnumber"/>
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                  </div>

                </div>
              </div>
               
              <div class="row">
                <div class="col-12  mb-4">
                  <label class="">Course</label>
                  <select class="form-select"  v-model="students.course_id">
                 
                         <option v-for="course in courses" :key="course.id" v-bind:value="course.id"> 
                                {{ course.title}}</option>
                  </select>
                

                </div>
              </div>
              <div class=" mb-4 pb-2">

                  <div class="form-outline">
                    <input type=""  class="form-control form-control-lg"  v-model="students.email"/>
                    <label class="form-label" for="emailAddress">Email</label>
                  </div>

                </div>
                 <div class=" mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password"  class="form-control form-control-lg"  v-model="students.password"/>
                    <label class="form-label" for="password">Password</label>
                  </div>

                </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
                    <label class="form-check-label" for="flexCheckDefault">
                       By using this form you agree with the
                       storage and handling <br>  of your data by this
                        website in accordance with our Privacy Policy
                    </label>
                    </div>
              <div class="mt-4 pt-2">
                
                 <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</template>



<script>
export default {
    data() {
        return {
             students: {},
             courses:{},
            error: null
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('api/course')
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
        register() {
            
           
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('api/stud',this.students )
                        .then(response => {
                          
                 // window.location.href = "/login"
                           
                               // this.error = response.data.message
                            
                        })
                       // .catch(function (error) {
                            //console.error(error);
                        //});
                })
           
        }
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next('dashboard');
        }
        next();
    }
}
</script>