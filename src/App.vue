<template>
  <div id="app">
    <el-container>
      <el-header height="120px"><Navbar/></el-header>
      <!--<el-main><Map/></el-main> -->

        <el-main class="main"><router-view></router-view></el-main>

      
    </el-container>
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue'
//import Map from './components/Map.vue'
//import axios from 'axios'

export default {
  name: 'App',
  components: {
      
      Navbar
  },
  created(){
    
  },
  methods:{

  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  
}
  .el-header {
    background-color: #B3C0D1;
    color: #333;
    text-align: center;
    line-height: 60px;
  }
  body > .el-container {
    margin-bottom: 0px;
  }
  .el-main {
    background-color: #E9EEF3;
    color: #333;
    text-align: center;
    
  }

</style>
