<template>
<div>
    <transition name="el-zoom-in-top">
        <Spot :spots="spots"/>        
    </transition>

</div>
</template>

<script>
import Spot from './Spot.vue'
import axios from 'axios'
import { API_BASE_URL } from "./config.js";

export default {
    name:'popular',
    components:{
        Spot
    },
    data(){
        return{
            spots:[

            ],

        }
    },
    mounted(){
      this.getpop();
    },
    methods:{
      getpop(){
        console.log('start getpop')
        axios({
              method: 'get',
              url: API_BASE_URL + '/pop',
              headers : { 
                
              },

            }).catch(function (error) {
                          // alert(error)
                          console.log(error);    
            }).then((res)=>{
                console.log(res)
              this.spots = res.data
                           
            })

      }

    },

//send: username, [post] like
//recieve: [get]userfavlist, spot 
}
</script>

<style>

</style>