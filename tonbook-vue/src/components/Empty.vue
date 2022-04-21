<template>
  <div class="container">
    <div>
      <h1>Il n'y a pas {{ type }}</h1>
    </div>
  </div>
</template>

<script>
export default {
  name: "Empty",
  props: {
    type: String,
  },
};
</script>

<style lang="scss" scoped>
.container {
  height: calc(100vh - 100px);
  padding: 20px;
  div {
    height: 300px;
    width: 50%;
    margin: auto;
    @include d-flex;
    text-align: center;
    background-color: $secondaryC;
    border-radius: 20px;
    color: $fontC;
  }
}
</style>