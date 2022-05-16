<template>
  <div>
    <form class="form form-inline" @submit.prevent="search">
      <input type="text" placeholder="Procurar?" class="form-control mr-1" v-model="filter">
      <button class="btn btn-secondary">Pesquisar</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      filter: ''
    }
  },
  methods: {
    search () {
      this.$emit('search', this.filter);
    }
  },
}
</script>

<style scoped>
</style>
