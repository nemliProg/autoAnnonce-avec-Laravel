<template>
  <!-- <Empty type="d'offre" /> -->
  
  <div class="offers">
    <h1>Les offres</h1>
    <Offer />
    <Offer />
    <Offer />
  </div>
</template>

<script>
// @ is an alias to /src
import Empty from '../components/Empty.vue'
import Offer from '../components/offers/Offer.vue'


export default {
  name: 'Offers',
  components: {
    Empty ,
    Offer
  }
}
</script>


<style lang="scss" scoped>
  .offers{
    width: min(500px,90%) ;
    margin: 50px auto;
    @include d-flex(column);
    gap: 30px;
    h1{
      text-align: center;
      font-family: $tenor;
      font-size: 2rem;
      color: $fontC;
      margin-bottom: 3rem;
    }
    
  }
</style>