<template>
  <div>
    <component :is="dataC"></component>
    <p class="not-acc">{{msg1}} <button @click="swap">{{msg2}}</button></p>
  </div>
  
</template>

<script>
// import HelloWorld from "./components/HelloWorld.vue"
import Login from "../components/Login.vue"
import Register from '../components/Register.vue'

export default {
  name: "Home",
  components: {
    "Login": Login,
    "Register": Register
  },
  data() {
    return { dataC: "Login", msg1: "Nu ai cont?", msg2: "Inregistreaza-te" }
  },
  methods: {
    swap() {
      if (this.dataC === "Login") {
          this.dataC = "Register";
          this.msg1 = "Ai deja un cont?"
          this.msg2 = "Logheaza-te"
        } else { 
          this.dataC = "Login";
          this.msg1=  "Nu ai cont?";
          this.msg2 = "Inregistreaza-te"
        }
    }
  },
  
}

</script>

<style scoped>

.not-acc {
  color: white;
  position: fixed;
  margin-top: 750px;
  left: 50%;
  transform: translate(-50%);
}

.not-acc button {
  background-color: transparent;
  outline: none;
  border: 0px solid transparent;
  color: aqua;
}

</style>