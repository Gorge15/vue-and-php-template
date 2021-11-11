<template>
  <el-container style="height: 900px; border: 1px solid #eee">
    <el-aside width="200px" style="background-color: rgb(238, 241, 246)">
      <el-menu :default-openeds="['1', '3']">
        <el-sub-menu index="1">
          <template #title>
            <el-icon><message /></el-icon>Dashboard
          </template>
          <el-menu-item-group>
            <template #title>Tabele</template>
            <el-menu-item index="1-1" @click="label = 'users'">Useri</el-menu-item>
            <el-menu-item index="1-2" @click="label = 'add-user'">Adauga user</el-menu-item>
          </el-menu-item-group>
        </el-sub-menu>
      </el-menu>
    </el-aside>

    <el-container>
     

      <el-main v-if="label === 'users'">
        <el-table :data="tabela" >
          <el-table-column prop="id" label="ID" width="140">
          </el-table-column>
          <el-table-column prop="date" label="Varsta" width="140">
          </el-table-column>
          <el-table-column prop="name" label="Nume" width="120">
          </el-table-column>
          <el-table-column prop="address" label="Addresa"> </el-table-column>
        </el-table>
      </el-main>
      <el-main v-if="label === 'add-user'" style="background-color: white;">
        <div v-if="message === 'ok'" style="background-color: #75ff91; width: 200px; height: 30px;">
            <p style="position: relative; top: 50%; transform: translateY(-50%); text-align: center">Userul a fost adaugat</p>
        </div>

        <div v-if="message === 'notok'" class="notok" style="background-color: #ff7575; width: 200px; height: 30px;">
              <p style="position: relative; top: 50%; transform: translateY(-50%); text-align: center">Userul exista deja</p>
        </div>
        <br>
        <h1>ADAUGA USER</h1>
          <form class="add-user">
            <input type="text" placeholder="Nume" v-model="nume">
            <input type="text" placeholder="Prenume" v-model="prenume">
            <input type="number" placeholder="Varsta" v-model="varsta">
            <input type="text" placeholder="Strada" v-model="strada">
            <input type="number" placeholder="Numar" v-model="numar">
            <input type="text" placeholder="Oras" v-model="oras">
            <input type="text" placeholder="Judet" v-model="judet">
            <input type="text" placeholder="Tara" v-model="tara">
          </form>
          <br>
          <el-button type="primary" @click="addUser">Adauga</el-button>
      </el-main>
    </el-container>
  </el-container>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { Message, Menu, Setting } from '@element-plus/icons'
import axios from "axios";
export default {
    name: 'Dashboard',
    components: {
    Message,
    Setting,
        'icon-menu': Menu,
    },
    methods: {
        async getDataUser() { 
          const { data } = await axios.get("http://localhost/datauser.php");
          return data;
        },

        addUser() {
          let data = {
            nume: this.nume,
            prenume: this.prenume,
            varsta: this.varsta,
            strada: this.strada,
            numar: this.numar,
            oras: this.oras,
            judet: this.judet,
            tara: this.tara
          };

          axios.post("http://localhost/add-user.php", data, {
            headers: {
              "Content-Type" : "application/x-www-form-urlencoded; charset=UTF-8"
            }
          }).then((res) => {
            let added = res.data;
            console.log(added);
            if (added === "DONE") {
              this.message = "ok";
            } else {
              this.message = "notok";
            }
          })
        }
    },
    data() {
        const tabel = [];

        this.getDataUser().then(data => {
          data.forEach(el => {
            tabel.push({id: el.id, date: el.date, name: `${el.name}`, address: `${el.address.split("_").join(" ")}`})
          });
        })
        const tabela = ref(tabel);
        console.log(tabela);
        return {
            tabela,
            label: "users",
            nume: "",
            prenume: "",
            varsta: "",
            strada: "",
            numar: "",
            oras: "",
            judet: "",
            tara: "",
            message: "waiting"
            }
  },

}

</script>

<style scoped>

.el-header {
  background-color: #b3c0d1;
  color: var(--el-text-color-primary);
  line-height: 60px;
}

.el-aside {
  color: var(--el-text-color-primary);
}

.add-user input{
  display: grid;
  margin-top: 10px;

}


</style>