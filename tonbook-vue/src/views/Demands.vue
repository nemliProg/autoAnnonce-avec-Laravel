<template>
  <div class="header">
    <h1>Les demandes</h1>
    <button>Add Demand</button>
  </div>
  
  <Empty v-if="demands.length === 0" type="de demande" />

  <div v-else class="demands">
    
    <div class="search">
      <div class="field-input">
        <input type="text" @keyup="search" v-model="input" placeholder="Search..." /><span></span>
      </div>
    </div>
    <demand v-for="demand in demands" :key="demand.id" :demand="demand" />
  </div>
</template>

<script>
import Empty from "../components/Empty.vue";
import Demand from "../components/demands/Demand.vue";

export default {
  name: "Demands",
  components: {
    Empty,
    Demand,
  },
  data() {
    return {
      input: "",
      data: null,
    };
  },
  methods: {
    search() {
      console.log(this.$store.state.demands);
    },
  },
  computed: {
    demands() {
      return this.$store.state.demands;
    },
  },
  mounted() {
    this.$store.dispatch("getDemands");
  },
};
</script>

<style lang="scss" scoped>
.header {
  padding-top: 20px;
  @include d-flex(row,space-around);
  h1 {
    text-align: center;
    font-family: $tenor;
    font-size: 2rem;
    color: $primaryC;
  }
  button {
    background-color: $tertiaryC;
    padding: 10px;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
  }
}
.demands {
  width: min(500px, 90%);
  margin: 50px auto;
  @include d-flex(column);
  gap: 30px;
  
  .search {
    max-width: 960px;
    margin: 0 auto;
    width: 100%;
    .field-input {
      text-align: center;
      input {
        text-align: left;
        border-radius: 6rem;
        border: 1px solid rgb(160, 160, 160);
        padding: 0.6rem 2rem 0.6rem 1rem;
        width: 12rem;
        font-family: "roboto";
        transition: 0.5s;
        &:focus {
          outline: none;
          border-color: #212121;
          transition: 0.5s;
        }
      }
      
    }
  }
}
</style>