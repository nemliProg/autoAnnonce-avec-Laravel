<template>
  <div class="header">
    <h1 @click="add">Les offres</h1>
    <button @click="toggleAdd">Add Offer</button>
  </div>
  <Empty v-if="offers.length === 0" type="d'offre" />

  <div v-else class="offers">
    <div class="search">
      <div class="field-input">
        <input
          type="text"
          @keyup="search"
          v-model="input"
          placeholder="Search..."
        /><span></span>
      </div>
    </div>
    <Offer v-for="offer in offers" :key="offer.id" :offer="offer" />
  </div>
  <AddOffer v-if="addToggle" :toggleAdd="toggleAdd"/>
</template>

<script>
// @ is an alias to /src
import Empty from "../components/Empty.vue";
import Offer from "../components/offers/Offer.vue";
import AddOffer from '../components/offers/AddOffer.vue'
import { mapState } from "vuex";

export default {
  name: "Offers",
  components: {
    Empty,
    Offer,
    AddOffer
  },
  data() {
    return {
      addToggle : false,
      input : ''
    };
  },
  methods: {
    toggleAdd(){
      this.addToggle = !this.addToggle;
    },
    search() {
      console.log(this.$store.state.offers);
    },
  },
  computed: {
    ...mapState({
      offersaa: (state) => state.offers,
    }),
    offers() {
      return this.$store.state.offers;
    },
  },
  mounted() {
    this.$store.dispatch("getOffers");
  },
};
</script>


<style lang="scss" scoped>
.header {
  padding-top: 20px;
  @include d-flex(row, space-around);
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
.offers {
  width: min(500px, 90%);
  margin: 30px auto;
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