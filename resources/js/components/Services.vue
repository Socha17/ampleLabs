<template>
  <div>
    <div v-if="step !== 'serviceData'" class="container">
      <h1>Welcome {{name}}</h1>
      <h3>We're here to help</h3>
      <h4>{{step === 'city' ? 'What city do you live in?' : `Services available in ${selectedCity.name}`}}</h4>
      <ItemList :items="items"></ItemList>
    </div>
    <div v-if="step === 'serviceData'" class="container">
      <h1>{{selectedService.name}} In {{selectedCity.name}}</h1>
      <h3>data</h3>
    </div>
  </div>
</template>

<script>

const axios = require('axios')
const url = 'http://localhost:8000'
import ItemList from './ItemList.vue'

export default {
  name: 'ToDoApp',
  props: {
    name: String
  },
  components: {
    ItemList,
  },
  data() {
    return {
      items: [],
      step: 'city',
      selectedCity: null,
    }
  },
  mounted() {
    this.getCities()
  },
  methods: {
    getCities() {
      axios.get(`/getCities`)
      .then((res) => {
        if (res.data.status === 0) {
          this.items = res.data.cities
        } else {
          this.$noty.error("Something went wrong")
        }
      }).catch()
    },
    getServiceData() {
      axios.get(`/getServiceData/${this.selectedService.id}`)
      .then((res) => {
        console.log(res);
        if (res.data.status === 0) {
          this.step = 'serviceData'
        } else {
          this.$noty.error("Something went wrong")
        }
      }).catch()
    },
    selectItem(item) {
      if (this.step === 'city') {
        this.items = item.services
        this.selectedCity = item;
        this.step = 'services'
      } else {
        this.selectedService = item;
        this.items = [];
        this.getServiceData()
      }
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
