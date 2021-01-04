<template>
  <div>

    <main>
      <div class="order">
        <el-button type="text" size="small"
          ><span class="order_bt">熱門</span>
        </el-button>
      </div>

      <div class="order">
        <el-button type="text" size="small" round
          ><span class="order_bt">最新</span>
        </el-button>
      </div>

    <transition name="el-zoom-in-top">
        <Spot :spots="spots" :username="username"/>        
    </transition>
  </div>
</template>

<script>
import Spot from './Spot.vue';
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
            username: ''

        }
    },
    mounted(){
      
      if(this.username == ''){
        this.username = sessionStorage.getItem('username')
        console.log('username is'+this.username)
      }
    
      this.getfav();
    },
    methods:{
      getfav(){
        axios({
              method: 'get',
              url: API_BASE_URL + '/fav/' + this.username,
              headers : { 
                
              },

            }).catch(function (error) {
                          // alert(error)
                          console.log(error);    
            }).then((res)=>{
              console.log(res.data)   
               this.spots = res.data        
              // let newarray = Array.from(res.data)
              // newarray.forEach((e) => {
              //   e.status = true
                
              // });
              // this.spots = newarray
              
              // let newarray = Array.from(res.data).map((element) =>{
              //   return{
              //     ...element,
              //     status: true
              //   }
              // });
              // this.spots = newarray
              console.log(this.spots)


            })

      }
    },


//send: username, [post] like
//recieve: [get]userfavlist, spot 
}
</script>

<style>
main {
  /*容器*/
  display: flex;
  flex-wrap: wrap;
  justify-content: left;
}
main > .order {
  flex: none;
  width: 80px;
  margin: 10px;
  text-align: center;
  background-color: #4b5267;
  border-radius: 5px;
}
.order_bt {
  font-family: "微軟正黑體";
  font-weight: bold;
  font-size: 14px;
  color: #fff;
}

</style>