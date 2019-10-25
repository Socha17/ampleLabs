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
      <h3>{{serviceText}} </h3>
      <div v-for="item in serviceJson" v-bind:key="item.name" class="card" v-on:click="emitItem(item)">
        <span> Name: {{item}}</span>
      </div>
      <h3>Contacts For Help</h3>
      <div v-for="contact in contacts" v-bind:key="contact.name" class="card" v-on:click="emitItem(contact)">
        <span> Name: {{contact.name}} - Number: {{Math.floor(Math.random() * 1000000000)}}</span>
      </div>
      <h3>Food Available</h3>
      <div v-for="item in foodItems" v-bind:key="item.name" class="card" v-on:click="emitItem(item)">
        <span> Name: {{item.product}}</span>
      </div>
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
      contacts: [],
      foodItems: [],
      step: 'city',
      selectedCity: null,
      selectedService: null,
    }
  },
  computed: {
    // a computed getter
    serviceText: function () {
      if (!this.selectedService) {
        return ''
      }
      return `${this.selectedService.name} Available`
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
          this.serviceJson = res.data.json.items
          this.contacts = res.data.contactsForHelp;
          this.foodItems = res.data.data.slice(0, 5);;
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
.card {
  border-radius: 6px;
  padding: 15px;
  margin: 20px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
</style>
