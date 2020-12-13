<template>
    <div class="google-map" id="map"></div>
</template>

<script>
import axios from 'axios'

export default {
    data(){
        return{
            map: null,
            lat: 25.0325917,
            lng: 121.5624999,
            spots: [],
            location: '',
        }

    },
    mounted(){
        this.initMap();
        this.setMarker();
    },
    methods: {
        initMap(){
            // 透過 Map 物件建構子建立新地圖 map 物件實例，並將地圖呈現在 id 為 map 的元素中
            this.map = new google.maps.Map(document.getElementById("map"), {
            // 設定地圖的中心點經緯度位置
            center: { lat: this.lat, lng: this.lng },
            // 設定地圖縮放比例 0-20
            zoom: 15,
            // 限制使用者能縮放地圖的最大比例
            maxZoom: 20,
            // 限制使用者能縮放地圖的最小比例
            minZoom: 3,
            // 設定是否呈現右下角街景小人
            streetViewControl: false,
            // 設定是否讓使用者可以切換地圖樣式：一般、衛星圖等
            mapTypeControl: false
            });
            
        },
        setMarker() {
            // 建立一個新地標
            const marker = new google.maps.Marker({
                // 設定地標的座標
                position: { lat: this.lat, lng: this.lng },
                // 設定地標要放在哪一個地圖
                map: this.map
            });
        },
        selectloc(){
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

<style>
.google-map {
  width: 100%;
  height: 400px;
}
</style>