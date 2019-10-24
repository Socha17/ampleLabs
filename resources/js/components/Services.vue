<template>
  <div>
    <div class="container">
      <h1>Welcome {{name}}</h1>
      <h3>We're here to help</h3>
      <h4>What city do you live in?</h4>
      <CityList :cities="cities"></CityList>
    </div>
  </div>
</template>

<script>

const axios = require('axios')
const url = 'http://localhost:8000'
import CityList from './CityList.vue'


export default {
  name: 'ToDoApp',
  props: {
    name: String
  },
  components: {
    CityList,
  },
  data() {
    return {
      cities: [],
    }
  },
  mounted() {
    this.getCities()
  },
  methods: {
    getCities() {
      axios.get(`/getCities`)
      .then((res) => {
        console.log(res);
        if (res.data.status === 0) {
          this.cities = res.data.cities
        } else {
          this.$noty.error("Something went wrong")
        }
      })
    },
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.container {
  max-width: 800px;
  margin: auto;
}
</style>
