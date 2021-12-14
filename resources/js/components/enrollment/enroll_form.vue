<template>
    <section class="vh-100 gradient-custom">
       
                


  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Enrollment Form</h3>
             <form @submit.prevent="enrollment()">

              <div class="row">
                <div class="col-md-6 mb-4">
                <input type="text"  class="form-control" v-model="enrollee.stud_id"  hidden/>
                  <div class="form-outline">
                    <input type="text"  class="form-control" v-model="name"  readonly/>
                   
                    <label class="form-label" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text"  class="form-control" v-model="lname"  readonly />
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>

                </div>
              </div>
                 <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text"  class="form-control" v-model="enrollee.mname" />
                    <label class="form-label" for="middleName">Middle Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" class="form-control" v-model="enrollee.suffix" />
                    <label class="form-label" for="suffix">Suffix</label>
                  </div>

                </div>
              </div>
           

              <div class="row">
             
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel"  class="form-control"   v-model="enrollee.pnumber"/>
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                  </div>

                </div>

                 <div class="col-md-6 mb-4 pb-2">
                <label class="form-check-label me-4" for="flexRadioDefault1">
                Marital Status
                 </label>
                  <div class="form-outline">
                    <input class="form-check-input" type="radio" value="single" v-model="enrollee.mstatus" id="">
                    <label class="form-check-label me-4" for="flexRadioDefault1">
                        Single
                    </label>
                     <input class="form-check-input" type="radio"  value="married" v-model="enrollee.mstatus" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        married
                    </label>
                  </div>

                </div>
              </div>
                <div class="row">
             
                <div class="col-md-6 mb-4 pb-2">

                  <div class="">
                       <label class="form-label" for="phoneNumber">Birth Date</label>
                    <input type="date"  class="form-control"   v-model="enrollee.bdate"/>
                   
                  </div>

                </div>

                 <div class="col-md-6 mb-4 pb-2">
                            <label class="form-check-label mb-2" for="flexRadioDefault1">
                        Gender
                    </label>
                  <div class="form-outline">

                    <input class="form-check-input" type="radio" value="male"  v-model="enrollee.gender" >
                    <label class="form-check-label me-4" for="flexRadioDefault1">
                        Male
                    </label>
                     <input class="form-check-input" type="radio" value="female"  v-model="enrollee.gender" >
                    <label class="form-check-label" >
                        Female
                    </label>
                  </div>

                </div>
              </div>
                 <div class=" mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text"  class="form-control"  v-model="enrollee.paddress" required/>
                    <label class="form-label" for="">
                        Permanent Address </label>
                  </div>
                 
                </div>
                  <div class=" mb-4 pb-2">
                  <div class="form-outline">
                    <input type="text"  class="form-control"  v-model="enrollee.slattended" required/>
                    <label class="form-label" for="">
                       School Last Attended </label>
                  </div>
                   </div>
                     <div class=" mb-4 pb-2">
                  <div class="form-outline">
                    <input type="text"  class="form-control"  v-model="enrollee.course" required/>
                    <label class="form-label" for="">
                       Course Enrolled </label>
                  </div>
                   </div>
              <div class="row">
                <div class="col-12  mb-4">
                  <label class="">Review Program</label>
                  <select class="form-select"  v-model="enrollee.prog_id">
                 
                         <option v-for="review in reviews" :key="review.id" v-bind:value="review.id"> 
                                {{ review.promo}},{{ review.review_type}} </option>
                  </select>
                

                </div>
              </div>
             
              <div class=" col-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text"  class="form-control"  v-model="enrollee.modepay"/>
                    <label class="form-label" for="emailAddress">Mode of Payment</label>
                  </div>

                </div>
                
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value=" 1 " v-model="enrollee.termcon" />
                    <label class="form-check-label" for="flexCheckDefault">
                       By using this form you agree with the
                       storage and handling <br>  of your data by this
                        website in accordance with our Privacy Policy
                    </label>
                    </div>
              <div class="mt-4 pt-2">
                
                 <button type="submit" class="btn btn-primary">
                                        Enroll
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
             enrollee: {},
            students: {},
             reviews:{},
            error: null,
             name: null,
             lname: null,
              id: null
        }
    },
    
   created() {
         this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('api/enroll/getprogram')
                .then(response => {
                    this.reviews = response.data;
                   
                })
                .catch(function (error) {
                    console.error(error);
                });
        })

          if (window.Laravel.user) {
            this.name = window.Laravel.user.fname
            this.lname = window.Laravel.user.lname
            this.enrollee.stud_id = window.Laravel.user.id

        }
    },
    methods: {
        enrollment() {
            
           
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('api/enroll/add', this.enrollee)
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
         if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
         else if (window.Laravel.user.role_id !== 2) {
            window.location.href = "/";
        }
        
        next();
    }
}
</script>