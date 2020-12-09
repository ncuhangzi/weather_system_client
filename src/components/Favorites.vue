<template>
  <h1>jimmy = {{jimmy}}</h1>
</template>

<script>
import axios from "axios"
export default {
  data: function (){
    return{
      jimmy:""
    }
  },
  mounted: function(){
    axios.get("/api/test.php")
    .then(res=>{
      console.log(res.data)
      this.jimmy = res.data['jimmy']
    })

    
  }
//send: username, [post] like
//recieve: [get]userfavlist, spot 
}
</script>

<style>

</style>