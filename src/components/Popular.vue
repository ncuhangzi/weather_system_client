<template>
<div>
    <Spot :spots="spots"/>

</div>
</template>

<script>
import Spot from './Spot.vue';

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
                    image:'https://www.meway.com.tw/jp/wp-content/uploads/2016/05/%E5%B7%A5%E4%BA%8B%E4%B8%AD.png',
                    city:'Tokyo',
                    info:'I have a pen.',
                    
                },
                {
                    name:'Tokyo Power',
                    image:'https://www.meway.com.tw/jp/wp-content/uploads/2016/05/%E5%B7%A5%E4%BA%8B%E4%B8%AD.png',
                    city:'Tokyo',
                    info:'I have a pen.',
                    
                },
                {
                    name:'Tokyo Flower',
                    image:'https://www.meway.com.tw/jp/wp-content/uploads/2016/05/%E5%B7%A5%E4%BA%8B%E4%B8%AD.png',
                    city:'Tokyo',
                    info:'I have a pen.',
                    
                }
            ],

        }
    }
//send: username, [post] like
//recieve: [get]userfavlist, spot 
}
</script>

<style>

</style>