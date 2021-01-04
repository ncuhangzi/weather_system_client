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
      <el-col span="22" offset="1">
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

    <el-form
      :model="ruleForm"
      :rules="rules"
      ref="ruleForm"
      class="demo-ruleForm"
    >
      <el-row class="field_content">
        <el-col :span="1">
          <font-awesome-icon icon="user-edit" class="icon" />
        </el-col>
        <el-col span="22" offset="1">
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
          <el-form-item label="" prop="nickname">
            <el-input
              v-model="ruleForm.nickname"
              placeholder="nickname_1"
              size="small"
              style="width: 70%"
            ></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row class="field_content">
        <el-col :span="1">
          <font-awesome-icon icon="venus-mars" class="icon" />
        </el-col>
        <el-col span="22" offset="1">
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
          <el-form-item prop="gender">
            <el-radio-group v-model="ruleForm.gender">
              <el-radio label="0">
                <span
                  class="el-form-item__label"
                  style="
                    width: 50%;
                    font-size: 20px;
                    font-weight: bold;
                    color: #7078b4;
                  "
                  >男
                </span></el-radio
              >

              <el-radio label="1">
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
            </el-radio-group>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row class="submit">
        <el-col :span="2" offset="11">
          <el-form-item>
            <el-button type="primary" @click="submitForm('ruleForm')"
              >提交</el-button
            >
          </el-form-item>
        </el-col>
      </el-row>
    </el-form>
  </div>
</template>

<script>
import axios from 'axios'
import {API_BASE_URL} from './config.js'

export default {
  data() {
    return {
      member_icon_line1: "https://i.imgur.com/RoK6Nte.png",

      dynamicValidateForm: {
        domains: [{ value: "" }],
        email: "",
      },

      ruleForm: {
        nickname: "",
        gender: "",
      },
      rules: {
        nickname: [
          { required: true, message: "請輸入暱稱", trigger: "blur" },
          { min: 3, max: 12, message: "長度 3∼12 個字", trigger: "blur" },
        ],
        gender: [{ required: true, message: "請選擇性別", trigger: "blur" }],
      },
    };
  },
  mounted(){
    this.dynamicValidateForm.email = sessionStorage.getItem('username')
    this.getmember();
  },

  methods: {
    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          alert("submit!");
        } else {
          console.log("error submit!!");
          return false;
        }
      });
      this.updatemember();
    },
    getmember(){
          axios({
              method: 'get',
              url: API_BASE_URL + '/member/'+this.dynamicValidateForm.email,
              headers : { 

              },
            }).catch(function (error) {
                          // alert(error)
                          console.log(error);    
            }).then((res)=>{
              console.log(res)
               this.dynamicValidateForm.email = res.data.email
               this.ruleForm.nickname = res.data.name
               this.ruleForm.gender = res.data.gender

              
                           
            })     

    },
    updatemember(){
        axios({
              method: 'post',
              url: API_BASE_URL + '/member/' + this.ruleForm.nickname+'/'+this.ruleForm.gender+'/'+this.dynamicValidateForm.email,
              headers : { 

              },

            }).catch(function (error) {
                          // alert(error)
                          console.log(error);    
            }).then((res)=>{
              console.log(res)
              //根據回傳判斷是否註冊成功
              if(res.data == true){
                
                alert('修改成功!')
              }

              
                           
            })
    },
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
.submit {
  height: 60px;
  margin-top: 3%;
  margin-left: 40%;
  margin-right: 40%;
}
</style>