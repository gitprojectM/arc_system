<template>
    <div>
        Welcome {{ name }} {{ lname }}
        
    </div>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            name: null,
            lname: null,
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.fname
            this.lname = window.Laravel.user.lname
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