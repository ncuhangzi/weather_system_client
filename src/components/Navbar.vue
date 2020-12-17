<template>

  <el-row :gutter="5" style="background:#D3DCF3">
     

    <el-col :span="4"><div class="grid-content bg-purple">      
        <el-button type="text" @click="to('/')" id="cars">地圖</el-button>    
    </div></el-col>
    
    <el-col :span="4"><div class="grid-content bg-purple">
        <el-button type="text" @click="to('/popular')" id="cars" size="medium">熱門</el-button>
    </div></el-col>
    <el-col :span="4"><div class="grid-content bg-purple">
        <el-button type="text" @click="to('/favorites')" id="cars">收藏</el-button>
    </div></el-col>
    
    <el-col :span="8" ><div class="grid-content bg-purple">
     <el-input placeholder="請輸入城市或景點" v-model="input3" class="input">
        <el-button slot="append" icon="el-icon-search"></el-button>
    </el-input>
    </div></el-col>
    <el-col :span="4"><div class="grid-content bg-purple">
        <el-button type="text" @click="to('/member')" id="cars">個人中心</el-button>
    </div></el-col>
  </el-row>

</template>

<script>
export default {
    data(){
        return{
            opened: false,
        }

    },
    methods: {
        to(path) {
            this.opened = false;
            this.$router.push({path: path});
        }, 
    },

}
</script>

<style>
    .el-row {
        margin-bottom: 20px;
        &:last-child {
        margin-bottom: 0;
        }
    }
    .el-col {
        border-radius: 0px;
    }
    .bg-purple-dark {
        background: #99a9bf;
    }
    .bg-purple {
        background: #C6C0CE;
        
    }
    .bg-purple-light {
        background: #e5e9f2;
    }
    .grid-content {
        border-radius: 0px;
        min-height: 60px;
    }
    .row-bg {
        padding: 10px 0;
        background-color: #D3DCF3;
    }

</style>