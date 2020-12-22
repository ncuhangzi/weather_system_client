<template>
  <div class="body">
    <el-row :gutter="5" style="background: #90b0ca">
      <el-row :gutter="12">
        <el-col :span="4" :push="2">
          <div class="logo">
            <a href="javascript:;" @click="to('/')">
              <el-image
                style="width: 55px; height: 55px"
                :src="logourl"
                :fit="contain"
              >
              </el-image>
            </a>
          </div>
        </el-col>
        <el-col :span="8">
          <div class="top_bar">景點天氣收藏系統</div>
        </el-col>
      </el-row>
      <el-row :gutter="12">
        <el-col :span="4"
          ><div class="grid-content bg-purple">
            <el-button type="text" @click="to('/')" id="cars">
              <span class="bt_tx">地圖</span></el-button
            >
          </div></el-col
        >

        <el-col :span="4"
          ><div class="grid-content bg-purple">
            <el-button
              type="text"
              @click="to('/popular')"
              id="cars"
              size="medium"
            >
              <span class="bt_tx">熱門</span></el-button
            >
          </div></el-col
        >
        <el-col :span="4"
          ><div class="grid-content bg-purple">
            <el-button type="text" @click="to('/favorites')" id="cars"
              ><span class="bt_tx">收藏</span></el-button
            >
          </div></el-col
        >

        <el-col :span="8"
          ><div class="grid-content bg-purple">
            <!-- <el-input placeholder="請輸入城市或景點" v-model="input3" class="input">
        <el-button slot="append" icon="el-icon-search"></el-button>
    </el-input> -->
          </div></el-col
        >
        <el-col :span="4"
          ><div class="grid-content bg-purple">
            <el-button type="text" @click="to('/member')" id="cars"
              ><span class="bt_tx">個人中心</span></el-button
            >
          </div></el-col
        >
      </el-row>
    </el-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      opened: false,
      logourl: "https://i.ibb.co/V2mXwbq/storm.png",
      //logourl: "./assets/storm.png"
    };
  },
  methods: {
    to(path) {
      this.opened = false;
      this.$router.push({ path: path });
    },
  },
};
</script>

<style>
.el-row {
  margin-bottom: 0px;
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
  background: #c6c0ce;
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
  background-color: #d3dcf3;
}
.logo {
  height: 60px;
  width: 60px;
}
.body {
  font-size: 22px;
  font-family: "微軟正黑體";
  font-weight: bold;
}
.top_bar {
  border-radius: 0px;
  min-height: 60px;
  font-weight: bold;
  color: #fff;
}
.bt_tx {
  color: #fff;
  font-family: "微軟正黑體";
  font-weight: bold;
  font-size: 18px;
}
</style>