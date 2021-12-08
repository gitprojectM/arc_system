<template>

  
    <!--Main Navigation-->
<div v-if="isLoggedIn">
  <!-- Sidebar -->
  <nav
       id="sidebarMenu"
       class="collapse d-lg-block sidebar collapse bg-white"
          >
    <div class="position-sticky" v-if="role === 1">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple active"
           aria-current="true"
           >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i
            ><span>Main dashboard</span>
        </a>
        
        <a
           href="/program"
           class="list-group-item list-group-item-action py-2 ripple "
           >
          <i class="fas fa-chart-area fa-fw me-3"></i
            ><span>Review Program</span>
        </a>
        <a
           href="/users"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-users me-3"></i><span>User</span></a
          >
        <a
           href="/course"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-lock fa-fw me-3"></i><span>Course</span></a
          >
        
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-lock fa-fw me-3"></i><span>Password</span></a
          >
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
            @click="logout"><i class="fas fa-money-bill fa-fw me-3"></i><span>Logout</span></a
          >
      </div>
    </div>
      <div class="position-sticky "  v-if="role === 2">
      <div class="list-group list-group-flush mx-3 mt-4">
        
         <a
           href="/enroll"
           class="list-group-item list-group-item-action py-2 ripple "
           aria-current="true"
           >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i
            ><span>Enroll</span>
        </a>
       
       
   
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
             src="https://arellanoreviewcenter.com/wp-content/uploads/2021/11/LOGOSITE.png"
             height="25"
             alt=""
             loading="lazy"
             />
      </a>
      <!-- Search form -->
      <form class="d-none d-md-flex input-group w-auto my-auto">
        <input
               autocomplete="off"
               type="search"
               class="form-control rounded"
               placeholder='Search (ctrl + "/" to focus)'
               style="min-width: 225px"
               />
        <span class="input-group-text border-0"
              ><i class="fas fa-search"></i
          ></span>
      </form>

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
    created() {
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