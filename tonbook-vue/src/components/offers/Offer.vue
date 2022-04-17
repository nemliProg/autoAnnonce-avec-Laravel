<template>
  <div class="offer">
      <header>
        <h3>Nemli Younes</h3>
        <div class="ud">
          <span><img src="../../assets/ud/edite.png" alt="edit"></span><span><img src="../../assets/ud/delete.png" alt="delete"></span>
        </div>
      </header>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis commodi ex nihil porro vero voluptatum repellendus quibusdam.</p>
      <p class="prix"> 30 MAD</p>
      <img src="../../assets/55004093._SX600_.jpg" alt="offer image">
    </div>
</template>

<script>
export default {
  name:"Offer"
}
</script>

<style lang="scss" scoped>
  .offer {
      background-color: $secondaryC;
      padding: 20px;
      border-radius: 10px;
      color: rgb(150, 75, 0);
      header{
        @include d-flex(row,space-between);
        padding: 5px 0px;
        .ud{
          @include d-flex;
          gap: 10px;
          span img{
            width: 25px;
            cursor: pointer;
          }
        }
      }
      .prix {
        color: $fontC;
        font-size: 1.5rem;
        padding: 5px 15px;
      }
      img{
        display: block;
        margin: 10px auto;
      }
    }
</style>