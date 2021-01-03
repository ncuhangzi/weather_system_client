<template>
  <div class="content">
    <div>
      <img class="line1" src="https://i.imgur.com/RoK6Nte.png" />
    </div>

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
                color: #5A6890;
              "
              >帳號</label
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
      
      :rules="rules"
      :model="ruleForm"
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
              color: #5A6890;
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
              color: #5A6890;
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
                    color: #5A6890;
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
                    color: #5A6890;
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
import axios from "axios";
import { API_BASE_URL } from "./config.js";

export default {
  name: "member",
  data() {
    return {
      dynamicValidateForm: {
        domains: [{ value: "" }],
        email: "",
      },
      ruleForm: {
        nickname: "pineapplepen",
        gender: "0",
      },
      rules: {
        nickname: [
          { required: true, message: "請輸入暱稱", trigger: "blur" },
          { min: 3, max: 12, message: "長度 3～12 個字", trigger: "blur" },
        ],
        gender: [{ required: true, message: "請選擇性別", trigger: "blur" }],
      },
    };
  },

  methods: {
    // getmember() {
    //   axios({
    //     method: "get",
    //     url: API_BASE_URL + "api/member",
    //     headers: {
    //       username: this.email,
    //       name: this.nickname,
    //       gender: this.gender,
    //     },
    //     data: {},
    //   })
    //     .catch(function (error) {
    //       // alert(error)
    //       console.log(error);
    //     })
    //     .then((res) => {
    //       this.member = res.data.member;
    //     });
    // },
    
    updatemember() {
      axios({
        method: "put",
        url: API_BASE_URL + "api/member",
        headers: {
        },
        data: {
          'name': this.nickname,
          'gender': this.gender,
        },
      })
        .catch(function (error) {
          // alert(error)
          console.log(error);
        })
        .then((res) => {
          this.member = res.data.member;
        });
    },

    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          alert("submit!");
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
  },

  //send [post]username, email, sex, password, nickname
  //receive
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
  color: #5A6890;
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

.line1 {
  display: block;
  margin: auto;
  width: 50%;
  height: 8px;
  margin-top: 3%;
}

@media screen and (max-width: 1200px) {
  .field_content {
    margin-top: 4%;
    margin-left: 25%;
    margin-right: 25%;
  }
  .line1 {
    width: 60%;
    height: 7px;
    margin-top: 5%;
  }
}
@media screen and (max-width: 1100px) {
  .field_content {
    margin-top: 4%;
    margin-left: 23%;
    margin-right: 23%;
  }
  .line1 {
    width: 65%;
    height: 7px;
  }
}
@media screen and (max-width: 750px) {
  .field_content {
    margin-top: 7%;
    margin-left: 20%;
    margin-right: 20%;
  }
  .line1 {
    width: 75%;
    margin-top: 8%;
  }
}
@media screen and (max-width: 650px) {
  .field_content {
    margin-top: 7%;
    margin-left: 15%;
    margin-right: 15%;
  }
  .line1 {
    width: 80%;
    margin-top: 15%;
  }
}
@media screen and (max-width: 550px) {
  .field_content {
    margin-top: 9%;
    margin-left: 10%;
    margin-right: 10%;
  }
  .line1 {
    width: 90%;
    margin-top: 17%;
  }
}
@media screen and (max-width: 450px) {
  .field_content {
    margin-top: 10%;
    margin-left: 5%;
    margin-right: 5%;
  }
  .line1 {
    width: 100%;
    margin-top: 20%;
  }
}
@media screen and (max-width: 400px) {
  .field_content {
    margin-top: 12%;
    margin-left: 0%;
    margin-right: 0%;
  }
  .line1 {
    width: 100%;
    margin-top: 25%;
  }
}
@media screen and (max-width: 350px) {
  .field_content {
    margin-top: 15%;
    margin-left: 0%;
    margin-right: 0%;
  }
  .line1 {
    width: 100%;
    margin-top: 43%;
  }
}
</style>