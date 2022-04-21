<template>
  <div class="form">
    <div class="signup-form">
      <div class="heading">Create your <b>Account</b></div>
      <div class="input-box">
        <form @submit.prevent="signin">
          <div class="np">
            <input
              type="text"
              class="input"
              placeholder="Nom..."
              required
              v-model="nom"
            />
            <input
              type="text"
              class="input"
              placeholder="Prenom..."
              required
              v-model="prenom"
            />
          </div>
          <input
            type="text"
            class="input"
            placeholder="Tel..."
            required
            v-model="tel"
          />
          <input
            type="text"
            class="input"
            placeholder="Email address..."
            required
            v-model="email"
          />
          <input
            type="password"
            class="input"
            placeholder="password..."
            required
            v-model="password"
          />
          <input
            type="password"
            class="input"
            placeholder="Repeat password..."
            required
            v-model="rePassword"
          />
          <input type="submit" class="submit" value="Create account" />
        </form>
      </div>
      <br />
      Already an member ?
      <button
        type="button"
        id="showCreateBtn"
        class="togglebtn"
        @click="toFunc"
      >
        Login
      </button>
      Now.
    </div>
  </div>
</template>

<script>
import axios from "axios"

export default {
  name: "Signin",
  props: {
    toggle: Boolean,
    toFunc: Function,
  },
  data() {
    return {
      nom: "",
      prenom: "",
      tel: "",
      email: "",
      password: "",
      rePassword: "",
    };
  },
  methods: {
    async signin() {
      let config = {
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      };

      axios
        .post("http://tonbook.io/api/register", {
          nom: this.nom,
          prenom: this.prenom,
          tel: this.tel,
          email: this.email,
          password: this.password,
          password_confirmation: this.rePassword,
        }, config)
        .then((response) => {
          let data = response.data;
          window.localStorage.setItem('token',data.token)
          window.localStorage.setItem('id',data.user.id)
          console.log(data)
          console.log(data.token)
          console.log(data.user.id)
          this.toFunc();
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>

<style lang="scss" scoped>
.form {
  position: relative;
  margin: 20px 0px;
  width: 90%;
  max-width: 480px;
  text-align: center;
  background: #fff;
  padding: 43px 40px;
  border-radius: 2px;
  .np {
    display: flex;
    gap: 5px;
  }
  .heading {
    color: #000;
    font-size: 1.3rem;
    margin: 0px 0 0px;
    height: 30px;
    line-height: 15px;
    text-align: center;
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
</style>
