<template>
  <nav>
    <div class="logo-holder">
      <router-link to="/">tonBook</router-link>
    </div>
    <ul>
      <li >
        <router-link to="/">Offres</router-link>
      </li>
      <li>
        <router-link to="/">Demandes</router-link>
      </li>
      
    </ul>
  </nav>
</template>

<script>
export default {
  name: "Nav",
};
</script>

<style lang="scss" scoped>
nav {
  @include d-flex(row,space-between);
  height: 45px;
  background-color: $primaryC;
  padding: 5px 20%;
  font-weight: 400;
  font-family: sans-serif;
  color: white;
  .logo-holder {
    width: 150px;
    a {
      font-size: 1.5rem;
      text-decoration: none;
      color: inherit;
    }
  }
  ul {
    @include d-flex;
    gap: 30px;
    list-style: none;
    li {
      a {
        text-decoration: none;
        color: inherit;
      }
    }
  }
}
</style>