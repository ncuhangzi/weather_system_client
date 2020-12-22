<template>
  <div>
      <el-row>
        <a href="javascript:;" @click="toContent(Spot.name, Spot.image, Spot.city, Spot.info, Spot.state)">
          <el-col :span="9"> 
                <div class="imagediv">
                <el-image
                style="width: 150px; height: 150px"
                :src="Spot.image"
                :fit="fit"
                ></el-image>
                </div>
          </el-col>
          <el-col :span="9"> 
                <span class="spotname">{{Spot.name}}</span>
          </el-col>
        </a>
          <el-col :span="6"> 
                <svg width="3em" height="3em" viewBox="0 0 16 16" :class="'bi bi-heart'+(state==true?'-fill':'')" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color:#cc99ff" @click="addtofav">
                  
                  <path v-if="state" fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                  <path v-if="costate" fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg>
          </el-col>
      </el-row>
      <el-divider></el-divider>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name:'spotside',
    props: ["Spot"],
    data(){
        return{
            state: this.Spot.state,
            costate: this.Spot.state,
        }
    },
    mounted(){
      if(this.state == false){this.costate = true}
    },
    watch:{
      state: function(){
        if(this.state){
          this.costate = false;
        }else{
          this.costate = true;
        }
      }

    },
    methods:{
        addtofav(){
            const h = this.$createElement;

            if(this.state){
              this.$notify({
              title: '通知',
              message: h('i', { style: 'color: #ff661a'}, '已將'+this.Spot.name+'移出收藏！')
              });
              this.state = false;
              
            }else{
              this.$notify({
              title: '通知',
              message: h('i', { style: 'color: teal'}, '已將'+this.Spot.name+'加入收藏！')
              });
              this.state = true;
              
            }
            //axios update
            //this.updatestate();


        },
        updatestate(){
            axios({
                method: 'put',
                url: process.env.WEATHER_API + 'api/like',
                headers : { 
                    'accessToken': sessionStorage.getItem('accessToken'),
                    'spotid': this.Spot.name 
                    
                },

                }).catch(function (error) {
                            // alert(error)
                            console.log(error);    
                }).then((res)=>{

                this.spots = res.data.spots
                            
                })

        },
        toContent  (spotname, image, city, info, state){
                  
                  this.$router.push({
                  path : '/spot' , 
                  query : { 
                    spotname: spotname,
                    image: image,
                    city: city,
                    info: info,
                    state: state
                  }
                })   
      
        },
    },
}
</script>

<style>
  .spotname{
    font-size: 2em;
    font-weight: bold;
    text-align: right;
    color: #333333;
    vertical-align: bottom;
  }
</style>