<template>
 <div>
    <section>
        <el-card class="box-card-page" :body-style="{ padding: '10px'}">
        <div slot="header" class="clearfix">
            <span>{{spotname}}</span>
            <el-button style="float: right" stype="warning" icon="el-icon-star-off" circle></el-button>
        </div>
        <div>
            <el-image
                style="width: 400px; height: 400px"
                :src="image"
                :fit="contain"
            ></el-image>
        </div>
        <div class="text item">
            {{city}}
        </div>
        <el-divider></el-divider>
        <div class="text item">
            {{info}}
        </div>
        </el-card>
    </section>


 </div>
</template>

<script>
import axios from 'axios'

export default {
    name: "",
    data (){
        return { 
            content: {},
            spotname: '',
            image: '',
            city: '',
            info: '',
            state: false,
        }
    },
    beforeMount(){
        //assign the query content to this variables
        this.content = this.$route.query
        this.spotname = this.content.spotname
        this.image = this.content.image
        this.city = this.content.city
        this.info = this.content.info
        this.state = this.content.state
    },
    mounted(){

    },
    methods:{
      updatestate(){
          axios({
                method: 'patch',
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

      }
    },

}
</script>

<style >
 .text {
    font-size: 14px;
  }

  .item {
    margin-bottom: 18px;
  }

  .clearfix:before,
  .clearfix:after {
    display: table;
    content: "";
  }
  .clearfix:after {
    clear: both
  }
  .el-image {
    width: 100%;
    
  }
  .box-card-page {
    height: 100%;
  }

</style>