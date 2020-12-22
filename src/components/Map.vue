<template>
    <!--<div class="google-map" id="map"></div>-->
    <div>
        <h2>請選擇一個城市</h2>
        <h2>你選擇的是：{{location}}</h2>
        <div class="imgarea">
            <!-- <img src="../assets/asiacity_map.png" alt="Workplace" usemap="#workmap" width="400" height="379"> -->
                <el-image
                style="width: 860px; height: 857px"
                :src="'https://i.imgur.com/TgcPtEb.png'"
                :fit="fit" alt="Workplace" usemap="#workmap"></el-image>

            <map name="workmap">
                <area shape="rect" coords="795,266,859,297" alt="Honolulu" href="javascript:;" @click="selectloc('Honolulu')">
                <area shape="circle" coords="322,181,7" alt="Xi An" href="javascript:;" @click="selectloc('Xi An')">
                <area shape="circle" coords="271,164,7" alt="Lanzhou" href="javascript:;" @click="selectloc('Lanzhou')">
                <area shape="circle" coords="421,146,7" alt="Shenyang" href="javascript:;" @click="selectloc('Shenyang')">
                <area shape="circle" coords="378,164,7" alt="Beijing" href="javascript:;" @click="selectloc('Beijing')">
                <area shape="circle" coords="406,196,7" alt="Qingdao" href="javascript:;" @click="selectloc('Qingdao')">
                <area shape="circle" coords="311,227,7" alt="Chongqing" href="javascript:;" @click="selectloc('Chongqing')">
                <area shape="circle" coords="392,220,7" alt="Nanjing" href="javascript:;" @click="selectloc('Nanjing')">
                <area shape="circle" coords="368,236,7" alt="Wuhan" href="javascript:;" @click="selectloc('Wuhan')">
                <area shape="circle" coords="413,231,7" alt="Shanghai" href="javascript:;" @click="selectloc('Shanghai')">
                <area shape="circle" coords="368,292,7" alt="Hong Kong" href="javascript:;" @click="selectloc('Hong Kong')">
                <area shape="circle" coords="312,305,7" alt="Hanoi" href="javascript:;" @click="selectloc('Hanoi')">
                <area shape="circle" coords="281,352,7" alt="Bangkok" href="javascript:;" @click="selectloc('Bangkok')">
                <area shape="circle" coords="321,371,7" alt="Ho Chi Minh" href="javascript:;" @click="selectloc('Ho Chi Minh')">
                <area shape="circle" coords="415,341,7" alt="Maynila" href="javascript:;" @click="selectloc('Maynila')">
                <area shape="circle" coords="290,416,7" alt="Kuala Lumpur" href="javascript:;" @click="selectloc('Kuala Lumpur')">
                <area shape="circle" coords="306,433,7" alt="Singapore" href="javascript:;" @click="selectloc('Singapore')">
                <area shape="circle" coords="322,475,7" alt="Jakarta" href="javascript:;" @click="selectloc('Jakarta')">
                <area shape="circle" coords="387,645,7" alt="Perth" href="javascript:;" @click="selectloc('Perth')">
                <area shape="circle" coords="526,666,7" alt="Adelaide" href="javascript:;" @click="selectloc('Adelaide')">
                <area shape="circle" coords="567,689,7" alt="Melbourne" href="javascript:;" @click="selectloc('Melbourne')">
                <area shape="circle" coords="605,661,7" alt="Sydney" href="javascript:;" @click="selectloc('Sydney')">
                <area shape="circle" coords="616,618,7" alt="Brisbane" href="javascript:;" @click="selectloc('Brisbane')">
                <area shape="rect" coords="538,323,585,349" alt="Guam" href="javascript:;" @click="selectloc('Guam')">
                <area shape="circle" coords="749,679,7" alt="Auckland" href="javascript:;" @click="selectloc('Auckland')">
                <area shape="circle" coords="748,704,7" alt="Wellington" href="javascript:;" @click="selectloc('Wellington')">
                <area shape="circle" coords="533,198,7" alt="Tokyo" href="javascript:;" @click="selectloc('Tokyo')">
                <area shape="circle" coords="500,208,7" alt="Osaka" href="javascript:;" @click="selectloc('Osaka')">
                <area shape="circle" coords="454,187,7" alt="Seoul" href="javascript:;" @click="selectloc('Seoul')">
                <area shape="circle" coords="509,88,7" alt="Vladivostok" href="javascript:;" @click="selectloc('Vladivostok')">
                
            </map>
        </div>

        <el-drawer
        title="相關景點推薦" :visible.sync="drawer" :direction="'ltr'" :before-close="handleClose" size='50%'>
            <h1>{{location}}的熱門景點：</h1>
            <div v-for="spot in spots" :key="spot.name">
                    <Spotside :Spot="spot"/>                
            </div>
            
        </el-drawer>

    </div>
</template>

<script>
import axios from 'axios'
import Spotside from './Spotside.vue'

export default {
    components: {
        Spotside
    },
    data(){
        return{
            map: null,
            lat: 25.0325917,
            lng: 121.5624999,
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
                    image:'https://img.travel98.com/xl/P_14871_c4a56264d38a3641751286028793f16a_o.jpg',
                    city:'Tokyo',
                    info:'東京鐵塔是位於日本東京芝公園的電波塔。其以巴黎艾菲爾鐵塔為範本而建造，高333公尺，比前者高13公尺，完工以來即成為東京著名地標與觀光景點。正式名稱為日本電波塔，這同時也是其營運機構的舊稱。目前為日本第二高的結構物，僅次於東京晴空塔。1958年，外表一根根交錯複雜像蜘蛛網結構的建築物，開始聳立於東京，成為最耀眼的日本地標「東京鐵塔」，它是廣播電視電波塔，全長高度有333公尺，分成塔下的大樓「Foottown」、「大展望台」即「Main Deck」位於150公尺、「特別展望台」位於250公尺，在經過一段時間的裝修後，將其新命名為「Top Deck」。',
                    count: 0,
                    state:false,
                    
                },
            ],
            location: '',
            drawer: false,
        }

    },
    mounted(){
        //this.initMap();
        //this.setMarker();
    },
    methods: {
        // initMap(){
        //     // 透過 Map 物件建構子建立新地圖 map 物件實例，並將地圖呈現在 id 為 map 的元素中
        //     this.map = new google.maps.Map(document.getElementById("map"), {
        //     // 設定地圖的中心點經緯度位置
        //     center: { lat: this.lat, lng: this.lng },
        //     // 設定地圖縮放比例 0-20
        //     zoom: 15,
        //     // 限制使用者能縮放地圖的最大比例
        //     maxZoom: 20,
        //     // 限制使用者能縮放地圖的最小比例
        //     minZoom: 3,
        //     // 設定是否呈現右下角街景小人
        //     streetViewControl: false,
        //     // 設定是否讓使用者可以切換地圖樣式：一般、衛星圖等
        //     mapTypeControl: false
        //     });
            
        // },
        // setMarker() {
        //     // 建立一個新地標
        //     const marker = new google.maps.Marker({
        //         // 設定地標的座標
        //         position: { lat: this.lat, lng: this.lng },
        //         // 設定地標要放在哪一個地圖
        //         map: this.map
        //     });
        // },
        selectloc(value){
            //console.log('current env:'+process.env.WEATHER_API)
            this.drawer = true;
            this.location = value;
            this.getSpot();
        },
        getSpot(){
          axios({
              method: 'get',
              url: process.env.WEATHER_API + 'api/spot',
              headers : { 
                'accessToken': sessionStorage.getItem('accessToken'), 
                'location': this.location,
              },

            }).catch(function (error) {
                          // alert(error)
                          console.log(error);    
            }).then((res)=>{

              this.spots = res.data
                           
            })
        },

        //send:city
        //recieve:[get] spot,userfavlist
    },
}
</script>

<style scoped>
.google-map {
  width: 100%;
  height: 400px;
}
.imgarea{
    background-color: white;
}
</style>