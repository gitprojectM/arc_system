
<template>
    <section class="vh-100 gradient-custom">
       
                


  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
             <img src="https://arellanoreviewcenter.com/wp-content/uploads/2021/11/LOGOSITE.png" class="card-img-top" alt="...">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
             <form>
                           
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text"  class="form-control form-control-lg" v-model="fname"  required/>
                    <label class="form-label" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                      
                    <input type="text"  class="form-control form-control-lg" v-model="lname"  required/>
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>

                </div>
              </div>
                
           

             
           
              <div class=" mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email"  class="form-control form-control-lg"  v-model="email"/>
                    <label class="form-label" for="emailAddress">Email</label>
                  </div>

                </div>
                 <div class=" mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password"  class="form-control form-control-lg"  v-model="password"/>
                    <label class="form-label" for="password">Password</label>
                  </div>

                </div>
                <div class=" mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" class="form-control form-control-lg"  />
                    <label class="form-label" for="password">Confirm Password</label>
                  </div>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"  required/>
                    <label class="form-check-label" for="flexCheckDefault">
                       By using this form you agree with the
                       storage and handling <br>  of your data by this
                        website in accordance with our Privacy Policy
                    </label>
                    </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" @click="handleSubmit">
                                        Register
                                    </button>
                                </div>
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
            fname: "",
             lname: "",
             
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('api/registerstud', {
                        fname:this.fname,
                         lname:this.lname,
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            if (response.data.success) {
                               window.location.href = "/"
                            } else {
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
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