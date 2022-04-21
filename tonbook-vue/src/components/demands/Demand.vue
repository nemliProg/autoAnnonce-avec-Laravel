<template>
  <div class="demand">
      <div class="ud">
        <span><img @click="update(demand.id)" src="../../assets/ud/edite.png" alt="edit" /></span
        ><span><img @click="dlt(demand.id)" src="../../assets/ud/delete.png" alt="delete" /></span>
      </div>
    <div class="demand-header">
      <img :src="demand.photo" alt="demand photo" />
      <div class="info">
        <h2>{{ demand.book_title }}</h2>
        <span class="cat">categorie : {{ demand.book_category }}</span>
      </div>
    </div>
    <div class="demand-footer">
      <div>
        <p>{{ demand.user.nom }} {{ demand.user.prenom }}</p>
        <span class="tel">Tel : {{ demand.user.tel }} </span>
      </div>
      <div>
        <span>créé à : {{ demand.updated_at }}</span>
        <span>modifier à : {{ demand.created_at }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name:"Demand",
  props: {
    demand: Object,
  },
  methods : {
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
        .delete(`http://tonbook.io/api/demand/${id}`, config)
        .then((response) => {
          let data = response.data;
          console.log(data);
        })
        .catch((err) => console.log(err));
    },
    edit(id) {
      alert(id);
    },
  }
}
</script>

<style lang="scss" scoped>
.demand {
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
  .demand-header {
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
  .demand-footer {
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
  .demand {
    width: 80%;
    .deamnd-header {
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
    .demand-footer {
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