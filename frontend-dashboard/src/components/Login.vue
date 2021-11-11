<template>
<div>
    <div class="error" v-if="access === false"><p>Contul nu exista!</p></div>
    <div class="login-base">
      <h1 class="noselect">Log-in</h1>
      <form>
        <input type="text" placeholder="username" maxlength="32" v-model="username">
        <input type="password" placeholder="password" maxlength="32" v-model="password">
        
        
      </form>
      <button class="log-in-btn" @click="login">Login</button>
      
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {

    name: "login",
    data() {
      return {
        username: "",
        password: "",
        access: true
      }
    },
    methods: {
      login() {
        let data = {
          username: this.username,
          password: this.password
        }

        axios.post("http://localhost/login.php", data, {
          headers : {
        'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
    }}).then(res => {
          let auth = res.data;
          // console.log(auth)
          if (auth === "OK") {
            this.$router.push('/dashboard');
          } else {
            this.access = false;
          }
        }).catch(err => console.log(err));
        
      }
    },
}

</script>

<style scoped>
  .login-base {
    position: absolute;
    width: 500px;
    height: 500px;
    background: rgb(0,245,255);
    background: -moz-linear-gradient(0deg, rgba(0,245,255,1) 0%, rgba(0,104,255,1) 100%);
    background: -webkit-linear-gradient(0deg, rgba(0,245,255,1) 0%, rgba(0,104,255,1) 100%);
    background: linear-gradient(0deg, rgba(0,245,255,1) 0%, rgba(0,104,255,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#00f5ff",endColorstr="#0068ff",GradientType=1);
    border-radius: 40px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

  }

  .login-base h1 {
    margin-top: 30px;
    position: relative;
    align-items: center;
    text-align: center;
    color: white;

  }

  .login-base form input {
    position: relative;
    background-color: transparent;
    color: white;
    border: 0px solid transparent;
    border-bottom: 1px solid white;
    margin-top: 60px;
    left: 50%;
    transform: translateX(-50%);
    width: 90%;
    text-align: center;
    height: 50px;
    font-size: 28px;
  }

  .login-base form input:focus, textarea:focus, select:focus{
    outline: none;
    
  }

  .log-in-btn {
    position: relative;
    width: 100px;
    height: 35px;
    margin-top: 29px;
    left: 50%;
    transform: translateX(-50%);
    background-color: hsla(0, 0%, 100%, 0.85);
    border: 0px solid transparent;
    border-radius: 15px;
    
  }

  .log-in-btn:hover {
    background-color: hsla(0, 0%, 100%, 1);
    
  }

  .login-base p {
    color: white;
    position: relative;
    margin-top: 29px;
    text-align: center;
    left: 50%;
    transform: translateX(-50%);
    
  }

::placeholder {
  color: white;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: white;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: white;
}
  .noselect {
  -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Old versions of Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome, Edge, Opera and Firefox */
}

</style>