<template>
  <div class="container">
    <div class="layer" @click="toggleAdd"></div>
    <div class="popup">
      <div class="form">
        <div class="signup-form">
          <div class="heading">Add <b>Offer</b></div>
          <div class="input-box">
            <form @submit.prevent="addOffer">
              <div class="np">
                <input
                  type="text"
                  class="input"
                  placeholder="Book Title..."
                  required
                  v-model="title"
                />
                <div class="select">
                  <input
                    list="options"
                    placeholder="Book Category..."
                    class="input"
                    required
                    v-model="category"
                  />
                  <datalist id="options">
                    <option
                      v-for="(cat, i) in categories"
                      :value="cat"
                      :key="i"
                    >
                      {{ cat }}
                    </option>
                  </datalist>
                </div>
              </div>
              <textarea
                class="input"
                style="max-width: 100%; min-width: 100%;max-height: 192px;"
                placeholder="Description..."
                required
                v-model="description"
              />
              <input
                type="file"
                class="input"
                @change="selectFile"
                placeholder="Image..."
                required
              />
              <input type="submit" class="submit" value="Create Add Offer" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "AddOffer",
  props : ['toggleAdd'],
  data() {
    return {
      title: "",
      category: null,
      description: "",
      image: null,
      categories: [
        "Action and Adventure",
        "Classics",
        "Comic Book or Graphic Novel",
        "Detective and Mystery",
        "Fantasy",
        "Historical Fiction",
        "Horror",
        "Literary Fiction",
        "Romance",
        "Science Fiction (Sci-Fi)",
        "Short Stories",
        "Biographies ",
        "Cookbooks",
        "History",
        "Poetry",
        "True Crime",
      ],
    };
  },
  methods: {
    addOffer() {
      let config = {
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      };
      const fd = new FormData();
      fd.append("book_title", this.title);
      fd.append("book_category", this.category);
      fd.append("description", this.description);
      fd.append("photo", this.image);
      fd.append("idUser", localStorage.getItem("id"));

      axios
        .post("http://tonbook.io/api/offer", fd, config)
        .then((response) => {
          console.log(response.data, "Offer Added")
          this.$store.state.offers.unshift(response.data)
          this.toggleAdd();
        })
        .catch((err) => console.log(err));
    },
    selectFile(event) {
      this.image = event.target.files[0];
      console.log(this.image);
    },
  },
};
</script>

<style lang="scss" scoped>
.container {
  width: 100vw;
  min-height: 100vh;
  overflow-y: scroll;
  @include d-flex;
  position: fixed;
  top: 0;
  left: 0;
  .layer {
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.726);
  }
  .popup {
    @include d-flex;
    .form {
      position: relative;
      margin:0px !important;
      width: 90%;
      max-width: 480px;
      text-align: center;
      background: #fff;
      padding: 20px 40px;
      border-radius: 2px;
      
      .np {
        display: flex;
        gap: 5px;
        & > .input:first-child {
          flex: 1;
        }
        & > .select {
          flex: 1.5;
        }
      }
      .heading {
        color: #000;
        font-size: 1.3rem;
        margin: 0px;
        height: 30px;
        line-height: 15px;
        text-align: center;
        text-transform: uppercase;
      }

      .input {
        width: 100%;
        padding: 15px;
        background: #f8f8f8;
        border: 1px solid rgba(0, 0, 0, 0.075);
        margin-bottom: 25px;
        color: black !important;
        font-size: 13px;
        transition: all 0.4s;
        font-size: 17px;
        letter-spacing: 2px;
        &:focus {
          color: white;
          outline: none;
          border: 1px solid #8bc3a3;
        }
      }
      .submit {
        width: 100%;
        padding: 0 20px;
        line-height: 50px;
        background: $secondaryC;
        color: $fontC;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        text-align: center;
        border: none;
        cursor: pointer;
        font-size: 17px;
        &:hover {
          background-color: $primaryC;
        }
      }
      .input-box {
        margin-top: 40px;
      }
      .togglebtn {
        color: $tertiaryC;
        background-color: transparent;
        border: none;
        outline: none;
        cursor: pointer;
        font-weight: 600;
        :hover {
          color: $secondaryC;
        }
      }
    }
  }
}
</style>
