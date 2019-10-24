<template>
  <div style="margin-top:25px;">
    <h2 v-if="items.length === 0">No Items In List</h2>
    <div v-for="city in cities" v-bind:key="item.id" class="card">

    </div>
  </div>
</template>

<script>

export default {
  name: 'CityList',
  props: ['cities'],
  components: {
  },
  data() {
    return {
    }
  },
  mounted() {

  },
  methods: {
  },
}
</script>

<style scoped>

.topSide {
  justify-content: space-around;
  display: flex;
}
.card {
  margin: 20px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.cardHeader {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
.listItem {
  display: flex;
  justify-content: space-around;
}
</style>
