<template>
  <div>
      <el-card class="box-card">
          <el-row>
              <el-col :span="4">
                <el-image
                style="width: 200px; height: 200px"
                :src="Spot.image"
                :fit="fit"
                ></el-image>
              </el-col>
              <el-col :span="20">
                <el-row :gutter="4"><el-col :span="20"><h3>{{Spot.name}}</h3></el-col><el-col :span="4"><el-button type="warning" icon="el-icon-star-off" circle @click="addtofav"></el-button></el-col></el-row>
                <el-row :gutter="4"><p>{{Spot.city}}</p></el-row>
                <el-row :gutter="16"><p>{{Spot.info}}</p></el-row>
            
              </el-col>
          </el-row>

      </el-card>

  </div>
</template>

<script>
export default {
    name:'spotitem',
    props: ["Spot"],
    data(){
        return{
            url: "https://www.meway.com.tw/jp/wp-content/uploads/2016/05/%E5%B7%A5%E4%BA%8B%E4%B8%AD.png"
        }
    },
    methods:{
        addtofav(){
            const h = this.$createElement;
            this.$notify({
            title: '通知',
            message: h('i', { style: 'color: teal'}, '已將'+this.Spot.name+'加入收藏！')
            });
        },
    },
}
</script>

<style>
  .box-card {
    margin-bottom: 20px;
    width: 100%;
    height: 300px;
  }
  .el-row{
      align-content: left;
  }
</style>