<template>
  <div class="offer">
    <div v-if="offer.user.id == idUser" class="ud">
      <span
        ><img
          @click="edit(offer)"
          src="../../assets/ud/edite.png"
          alt="edit" /></span
      ><span
        ><img
          @click="dlt(offer.id)"
          src="../../assets/ud/delete.png"
          alt="delete"
      /></span>
    </div>
    <div class="offer-header">
      <img :src="offer.photo" alt="offer photo" />
      <div class="info">
        <h2>{{ offer.book_title }}</h2>
        <span class="cat">categorie : {{ offer.book_category }}</span>
        <p>{{ offer.description }}</p>
      </div>
    </div>
    <div class="offer-footer">
      <div>
        <p>{{ offer.user.nom }} {{ offer.user.prenom }}</p>
        <span class="tel">Tel : {{ offer.user.tel }} </span>
      </div>
      <div>
        <span>créé à : {{ offer.updated_at }}</span>
        <span>modifier à : {{ offer.created_at }}</span>
      </div>
    </div>
  </div>
  <UpdateOffer v-if="editToggle" :offer="ofr" :toggleEdit="toggleEdit"/>
</template>

<script>
import axios from "axios";
import UpdateOffer from '../offers/UpdateOffer.vue'
export default {
  name: "Offer",
  components : {
    UpdateOffer
  },
  props: {
    offer: Object,
  },
  data() {
    return {
      editToggle : false, 
      idUser: localStorage.getItem("id"),
      ofr : {}
    }
  },
  methods: {
    async dlt(id) {
      let token = localStorage.getItem("token");
      let config = {
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      axios
        .delete(`http://tonbook.io/api/offer/${id}`, config)
        .then((response) => {
          let data = response.data;
          console.log(data);
          this.$store.state.offers = this.$store.state.offers.filter(
            (o) => o.id !== id
          );
        })
        .catch((err) => console.log(err));
    },
    edit(offer) {
      this.ofr.id = offer.id
      this.ofr.title = offer.book_title
      this.ofr.category = offer.book_category
      this.ofr.description = offer.description
      this.ofr.image = offer.photo

      console.log(this.ofr)
      this.toggleEdit()
    },
    toggleEdit(){
      this.editToggle = !this.editToggle
    }
  },
};
</script>

<style lang="scss" scoped>
.offer {
  background-color: $secondaryCBG;
  border-radius: 10px;
  padding: 5px;
  .ud {
    @include d-flex;
    gap: 10px;
    span img {
      width: 25px;
      cursor: pointer;
    }
  }
  .offer-header {
    display: grid;
    justify-content: center;
    align-items: flex-start;
    padding: 20px 20px 0px 20px;
    grid-template: 1fr / 1fr 2fr;
    img {
      width: 100%;
      border-radius: 5px;
    }
    .info {
      padding: 10px 0px 0px 15px;

      .cat {
        font-size: 12px;
      }
      p {
        padding-top: 10px;
      }
    }
  }
  .offer-footer {
    padding: 15px;
    display: flex;
    div {
      display: flex;
      flex-direction: column;
    }
    div:first-child {
      align-items: flex-start;
      flex: 1;
    }
    div:last-child {
      flex: 1;
      align-items: flex-end;
    }
  }
}
@media screen and (max-width: 800px) {
  .offer {
    width: 80%;
    .offer-header {
      display: grid;
      grid-template: 1fr auto / 1fr;
      text-align: center;
      img {
        width: 180px;
        border-radius: 5px;
        margin: auto;
      }
      .info {
        padding: 10px 0px 0px 15px;
        .cat {
          font-size: 12px;
        }
        p {
          padding-top: 10px;
        }
      }
    }
    .offer-footer {
      flex-direction: column;
      div:first-child {
        align-items: center;
        flex: 1;
      }
      div:last-child {
        padding-top: 10px;
        flex: 1;
        align-items: flex-end;
      }
    }
  }
}
</style>