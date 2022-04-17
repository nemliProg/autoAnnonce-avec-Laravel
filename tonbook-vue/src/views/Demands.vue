<template>
    <!-- <Empty type="d'offre" /> -->
  
  <div class="damands">
    <h1>Les demandes</h1>
    <Demand />
    <Demand />
    <Demand />
  </div>
</template>

<script>
import Demand from '../components/demands/Demand.vue'
export default {
name : "Demands",
components : {
  Demand
}
}
</script>

<style lang="scss" scoped>
  .damands{
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