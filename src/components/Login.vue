<template>
<div class="loginform">
    {{test}}

    <el-form :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
    <el-form-item label="E-mail" prop="email" label-width="100px">
        <el-input v-model="username"></el-input>
    </el-form-item>
    <el-form-item label="密碼" prop="password">
        <el-input v-model="password" show-password></el-input>
    </el-form-item>
    <el-form-item>
        <el-button type="text" round @click="to('/register')">建立帳號</el-button>
        <el-button type="primary" round @click="submit">登入</el-button>
    </el-form-item>
    </el-form>

</div>
  
</template>

<script>
import axios from 'axios'
import {API_BASE_URL} from './config.js'

export default {
    name:'login',
    data(){
        return{
            token: '',
            username: '',
            password: '',
            test: [],
            rules: {
                email: [
                    { required: true, message: '請輸入正確email格式', trigger: 'blur' },
                    { min:1, max: 30, message: '長度須介於1到30字元', trigger: 'blur' }
                ],
                password: [
                    { required: true, message: '密碼不得留空', trigger: 'change' },
                    { min:8, max: 15, message: '長度須小於8到15字元', trigger: 'blur' }
                ]
            },

        }
    },
    mounted(){
        this.checklogin();
        this.gettest();
    },
    methods:{
        checklogin(){

        },
        submit(){
          axios({
              method: 'post',
              url: API_BASE_URL + '/login',
              headers : { 

              },
              data: {
                'email' : this.username,
                'password' : this.password,
              },

            }).catch(function (error) {
                          // alert(error)
                          console.log(error);    
            }).then((res)=>{
                console.log(res)

              this.token = res.data
                //write login authencation logic here!
                if( this.token == 'Imlogin' ){
                sessionStorage.setItem('token', 'Imlogin')
                this.$router.push('/');
                } else{
                alert('login failed')
                }           
            })
        },
        gettest(){
          axios({
              method: 'get',
              url: API_BASE_URL + '/test',
              headers : { 

              },

            }).catch(function (error) {
                          // alert(error)
                          console.log(error);    
            }).then((res)=>{
                console.log(res)

              this.test = res.data
                           
            })
        },
        to(path) {
            this.opened = false;
            this.$router.push({path: path});
        },
    }




//send:[post] username, password
//recieve: token, login result
}
</script>

<style>
.loginform{
    width: 500px;
    margin:0px auto;
}
</style>