<template>
    <section class="vh-100">
     
  <div class="container col-8  py-5 h-100">
 
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-6 col-md-6 ">
        <img src="\images\logo.jpg" class="img-fluid" alt="Phone image">
      </div>
      
      <div class="col-6 col-md-6 ">
        <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>
        <div class="  col-12   mb-4">
             <h1 class="text-center text-success ">Login</h1>
        </div>
      
        <form>
          <!-- Email input -->
          
          <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control form-control-lg" v-model="email"  required />
            <label class="form-label" for="">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control form-control-lg" v-model="password"  required />
            <label class="form-label" for="form1Example23">Password</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
                checked
              />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-success btn-lg btn-block"  @click="handleSubmit">Sign in</button>

          

         

        </form>
      </div>
    </div>
  </div>
</section>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            console.log(response.data)
                            if (response.data.success) {
                                this.$router.go('/dashboard')
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