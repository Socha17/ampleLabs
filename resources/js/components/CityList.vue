<template>
  <div class="CityList">
    <div v-for="city in cities" v-bind:key="city.id" class="card">
      <span>{{city.name}}</span>
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
    console.log(this.cities);
  },
  methods: {
  },
}
</script>

<style scoped>

.CityList {
  margin-top: 25px;
  display: flex;
}
.topSide {
  justify-content: space-around;
  display: flex;
}
.card {
  padding: 15px;
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
