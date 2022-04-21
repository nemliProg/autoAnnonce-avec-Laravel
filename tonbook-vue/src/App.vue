<template>
  <Nav />
  <router-view />
  <Footer />
</template>

<script>
import Nav from "./components/Nav.vue";
import Footer from "./components/Footer.vue";
export default {
  name: "App",
  components: {
    Nav,
    Footer,
  },
  mounted(){
    if (localStorage.getItem('token') !== null) {
          this.$store.dispatch("setIsLoggedIn", true);
    }else {
      this.$router.push({name : 'auth'})
    }
  }
};
</script>

<style lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: $poppins;
}

</style>
