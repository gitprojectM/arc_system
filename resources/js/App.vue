<template>

  <flash message=""></flash>
    <!--Main Navigation-->
<div v-if="isLoggedIn">
  <!-- Sidebar -->
  <nav
       id="sidebarMenu"
       class="collapse d-lg-block sidebar collapse bg-white"
          >
    <div class="position-sticky" v-if="role === 1">
      <div class="list-group list-group-flush mx-3 mt-4">
       
         <router-link to="/dashboard"  class="list-group-item list-group-item-action py-2 ripple" active-class="active" 
           aria-current="true">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i
            ><span>Main dashboard</span>
       </router-link>
     <router-link to="/program" class="list-group-item list-group-item-action py-2 ripple " active-class="active" >
      <i class="fas fa-chart-area fa-fw me-3"></i
            ><span>Review Program</span>
     </router-link >
       <router-link to="/users" class="list-group-item list-group-item-action py-2 ripple" active-class="active" >
<i class="fas fa-users me-3"></i><span>User</span>
       </router-link>
         
        <router-link to="/course"   class="list-group-item list-group-item-action py-2 ripple" active-class="active" >
         <i class="fas fa-lock fa-fw me-3"></i><span>Course</span>
        </router-link>
       
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
            @click="logout"><i class="fas fa-money-bill fa-fw me-3"></i><span>Logout</span></a
          >
      </div>
    </div>
      <div class="position-sticky "  v-if="role === 2">
      <div class="list-group list-group-flush mx-3 mt-4">
        
          <router-link  :to="{ path: 'dashboard' }"  class="list-group-item list-group-item-action py-2 ripple" active-class="active" 
           aria-current="true">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i
            ><span>Main dashboard</span>
        </router-link>
        <router-link v-bind:to="'enroll'"   class="list-group-item list-group-item-action py-2 ripple" active-class="active" >
                <i class="fas fa-tachometer-alt fa-fw me-3"></i
            ><span>Enroll</span>
          </router-link>
      
        
        
       
       
       
   
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
            @click="logout"><i class="fas fa-money-bill fa-fw me-3"></i><span>Logout</span></a
          >
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav
       id="main-navbar"
       class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
       >
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#sidebarMenu"
              aria-controls="sidebarMenu"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="#">
        <img
             src=""
             height="25"
             alt=""
             loading="lazy"
             />
      </a>
      <!-- Search form -->
     

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->
       

        <!-- Icon -->
      
        <!-- Icon -->
    

        <!-- Icon dropdown -->
       
        <!-- Avatar -->
       
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px" >
  <div class="container pt-4" >
  <router-view/>
  </div>
</main>
</div>
<div v-else>
    <router-view/>
</div>
 
<!--Main layout-->
 
</template>

<script>

export default {
    name: "App",
    rile:{},
    data() {
        return {
            isLoggedIn: false,
        }
    },
    mounted() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
    
     
        if (window.Laravel.user) {
            this.role = window.Laravel.user.role_id
        }
    },
    methods: {
        logout(e) {
            console.log('ss')
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
}
</script>