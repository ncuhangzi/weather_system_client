<template>
  <div class="content">
    <el-image
      style="width: 700px; height: 7px; margin-top: 5%"
      :src="member_icon_line1"
      :fit="fit"
    ></el-image>

    <el-row class="field_content">
      <el-col :span="1" style="color: #7078b4">
        <font-awesome-icon icon="envelope" class="icon" />
      </el-col>
      <el-col span="23">
        <el-form ref="form" :model="form" class="demo-dynamic">
          <div class="el-form-item">
            <label
              class="el-form-item__label"
              style="
                width: 20%;
                font-size: 20px;
                font-weight: bold;
                color: #7078b4;
              "
              >信箱</label
            >
            <el-input
              size="small"
              style="width: 70%"
              placeholder="a123@gmail.com"
              v-model="dynamicValidateForm.email"
              :disabled="true"
            ></el-input>
          </div>
        </el-form>
      </el-col>
    </el-row>

    <el-row class="field_content">
      <el-col :span="1">
        <font-awesome-icon icon="user-edit" class="icon" />
      </el-col>
      <el-col :span="23">
        <el-form ref="form" :model="form" class="demo-dynamic">
          <div class="el-form-item">
            <label
              class="el-form-item__label"
              style="
                width: 20%;
                font-size: 20px;
                font-weight: bold;
                color: #7078b4;
              "
              >暱稱</label
            >
            <el-input
              v-model="input"
              placeholder="nickname_1"
              size="small"
              style="width: 70%"
            ></el-input>
          </div>
        </el-form>
      </el-col>
    </el-row>

    <el-row class="field_content">
      <el-col :span="1">
        <font-awesome-icon icon="venus-mars" class="icon" />
      </el-col>
      <el-col :span="23">
        <el-form>
          <label
            class="el-form-item__label"
            style="
              width: 20%;
              font-size: 20px;
              font-weight: bold;
              color: #7078b4;
            "
            >性別</label
          >
          <el-radio v-model="radio" label="0">
            <span
              class="el-form-item__label"
              style="
                width: 50%;
                font-size: 20px;
                font-weight: bold;
                color: #7078b4;
              "
              >男</span
            ></el-radio
          >

          <el-radio v-model="radio" label="1">
            <span
              class="el-form-item__label"
              style="
                width: 50%;
                font-size: 20px;
                font-weight: bold;
                color: #7078b4;
              "
              >女</span
            ></el-radio
          >
        </el-form>
      </el-col>
    </el-row>
  </div>
</template>

<script>
//import axios from 'axios'

export default {
  data() {
    return {
      dynamicValidateForm: {
        domains: [{ value: "" }],
        email: "",
      },

      member_icon_line1: "https://i.imgur.com/RoK6Nte.png",
      member_icon_line2: "https://i.imgur.com/R8KWfse.png",

      radio: "0",
      input: "",
    };
  },

  //send [post]username, email, sex, password, nickname
  //recieve
};
</script>

<style>
.content {
  margin-left: auto;
  margin-right: auto;
  width: 100%;
}

.field_content {
  height: 60px;
  margin-top: 3%;
  margin-left: 35%;
  margin-right: 35%;
}

.icon {
  display: inline-block;
  font-size: 25px;
  line-height: 40px;
  color: #7078b4;
  width: 40px;
  height: 40px;
  text-align: center;
  vertical-align: bottom;
}
</style>