<template>
  <div class="container">
      <Login v-if="toggle" :toggle="toggle" :toFunc="toggleFunc" />
      <Signin v-else :toggle="toggle" :toFunc="toggleFunc" />
  </div>
</template>

<script>
import Login from "../components/Login.vue";
import Signin from "../components/Signin.vue";

export default {
  name: "",
  components: {
    Login,
    Signin,
  },
  data() {
    return {
      toggle : true
    }
  },
  methods : {
    toggleFunc() {
      this.toggle = !this.toggle;
    }
  }
};
</script>

<style scoped lang="scss">

.container {
  @include d-flex(column);
  padding: 20px;

  
}

</style>
