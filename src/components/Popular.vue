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

export default {
    name:'popular',
    components:{
        Spot
    },
    data(){
        return{
            spots:[
                {
                    name:'Tokyo Tower',
                    image:'https://img.travel98.com/xl/P_14871_c4a56264d38a3641751286028793f16a_o.jpg',
                    city:'Tokyo',
                    info:'東京鐵塔是位於日本東京芝公園的電波塔。其以巴黎艾菲爾鐵塔為範本而建造，高333公尺，比前者高13公尺，完工以來即成為東京著名地標與觀光景點。正式名稱為日本電波塔，這同時也是其營運機構的舊稱。目前為日本第二高的結構物，僅次於東京晴空塔。1958年，外表一根根交錯複雜像蜘蛛網結構的建築物，開始聳立於東京，成為最耀眼的日本地標「東京鐵塔」，它是廣播電視電波塔，全長高度有333公尺，分成塔下的大樓「Foottown」、「大展望台」即「Main Deck」位於150公尺、「特別展望台」位於250公尺，在經過一段時間的裝修後，將其新命名為「Top Deck」。',
                    count: 0,
                    state:false,
                    
                },
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
            favlist:[
                {
                    id: null,
                    
                }
            ],

        }
    },
    mounted(){
      //this.getpop();
    },
    methods:{
      getpop(){
        axios({
              method: 'get',
              url: process.env.WEATHER_API + 'api/pop',
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