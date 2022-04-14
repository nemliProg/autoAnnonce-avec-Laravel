<template>
  <!-- <Empty type="d'offre" /> -->
  <div class="offers">
    <div class="offer">
      <h3 class="title"></h3>
      
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Empty from '../components/Empty.vue'
import Offer from '../components/offers/Offer.vue'


export default {
  name: 'Offers',
  components: {
    Empty
  }
}
</script>
