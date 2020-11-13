<template>
    <div>
        <div v-for="spot in spots" :key="spot.name">
            <SpotItem :spot="spot"/>

        </div>
    </div>
  
</template>

<script>
import SpotItem from './SpotItem.vue'


export default {
    name:'Spot',
    components: {
        SpotItem
    },
    props:["spots"]
}
</script>

<style>

</style>