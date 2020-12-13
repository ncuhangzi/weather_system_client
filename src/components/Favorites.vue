<template>  
  <div>
    <transition name="el-zoom-in-top">
        <Spot :spots="spots"/>        
    </transition>
  </div>
</template>

<script>
import Spot from './Spot.vue';
import axios from 'axios'

export default {
    name:'popular',
    components:{
        Spot
    },
    data(){
        return{
            spots:[
                {
                    name:'Tokyo Power',
                    image:'https://www.meway.com.tw/jp/wp-content/uploads/2016/05/%E5%B7%A5%E4%BA%8B%E4%B8%AD.png',
                    city:'Tokyo',
                    info:'I have a pen.',
                    state:true,
                    
                },
                {
                    name:'Tokyo Flower',
                    image:'https://www.meway.com.tw/jp/wp-content/uploads/2016/05/%E5%B7%A5%E4%BA%8B%E4%B8%AD.png',
                    city:'Tokyo',
                    info:'I have a pen.',
                    state:true,
                    
                }
            ],

        }
    },
    mounted(){
      //this.getfav();
    },
    methods:{
      getfav(){
        axios({
              method: 'get',
              url: process.env.WEATHER_API + 'api/fav',
              headers : { 
                'accessToken': sessionStorage.getItem('accessToken'), 
                
              },

            }).catch(function (error) {
                          // alert(error)
                          console.log(error);    
            }).then((res)=>{

              this.spots = res.data.spots
                           
            })

      }
    },


//send: username, [post] like
//recieve: [get]userfavlist, spot 
}
</script>

<style>

</style>