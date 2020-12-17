<template>
<div>
    <input v-model="username">
    {{username}}
    <el-button type="primary" round>登入</el-button>
</div>
  
</template>

<script>
import axios from 'axios'

export default {
    name:'login',
    data(){
        return{
            token: '',
            username: '',
            password: '',

        }
    },
    mounted(){
        this.checklogin();
    },
    methods:{
        checklogin(){

        },
        login(){
            //write login authencation logic here!
            if( this.userName == 'abcd' && this.password == '1234' ){
            localStorage.setItem('token', 'ImLogin')
            this.$router.push('/');
            } else{
            alert('login failed')
            }
        },
        submit(){
          axios({
              method: 'post',
              url: process.env.WEATHER_API + 'api/login',
              headers : { 
                'username' : this.username,
                'password' : this.password,
              },
              data: {

              },

            }).catch(function (error) {
                          // alert(error)
                          console.log(error);    
            }).then((res)=>{

              this.token = res.data.token
                           
            })
        }
    }




//send:[post] username, password
//recieve: token, login result
}
</script>

<style>

</style>