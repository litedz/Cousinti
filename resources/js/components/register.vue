<template>
  <div class="register-page">
    <div class="content">
      <status ref="status"></status>
      <img :src="avatar" alt="">
      <div class="register-area">
        <div class="container">
          <div class="row position-relative">
            <div class="col-12 col-md-5 position-relative">
              <div class="cover rounded-left">
                <div class="img-cover w-100 h-100 position-absolute" style="z-index: 1">
                  <img src="https://img.le-dictionnaire.com/cuisine.jpg" alt="" srcset=""
                    class="h-100 w-100 rounded-left" />
                </div>
                <div class="h-100 opacity-50 opt position-absolute w-100 rounded-left" style="z-index: 10"></div>
              </div>
              <div
                class="d-flex flex-column justify-content-evenly p-3 position-absolute text-white top-0 mt-5 rounded-left"
                style="z-index: 11" dir="rtl">
                <div class="title h1">نص الحساب</div>
                <div class="font-08 lh-lg mt-4 text">
                  هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                  المساحة، لقد تم توليد هذا النص من مولد النص
                  العربى، حيث يمكنك أن تولد مثل هذا النص أو
                  العديد من النصوص الأخرى ...
                </div>
              </div>
            </div>
            <div class="col-12 col-md-5">
              <div class="form h-100 p-2 pt-3 rounded-right border border-bottom-0" dir="rtl">
                <div class="Sing-with w-100 border-bottom p-2 text-center">
                  <!-- Login Button facebook -->
                  <div
                    class="align-items-center bg-primary button-facebook d-flex font-amiri fs-6 fw-bold justify-content-center mx-auto p-2 rounded text-white w-50 pointer"
                    @click="ConnectToTheFacebook()">
                    <img :src="w_path+'/images/faceicon.png'"  class="img-fluid mx-2" style="width: 25px;">
                    <div class="text">تسجيل عن طريق الفيس بوك</div>
                  </div>
                  <!--    -->
                </div>
                <FormKit type="form" :actions="false">
                  <FormKit type="text" v-model="username" dir="rtl" input-class="form-control mb-2 font-amiri fs-5"
                    validation="required|length:3" name="username" label="اسم المستعار"
                    label-class="mb-2 font-amiri font-2 me-1 mt-2" placeholder="اسم المستعار . . ." />

                  <div class="d-flex">
                    <FormKit type="text" v-model="first_name" dir="rtl" wrapper-class="m-1"
                      input-class="form-control mb-2 font-amiri fs-5" validation="required|length:3" name="name"
                      label="اسم الاول" label-class="mb-2 font-amiri font-2 me-1 mt-2" placeholder="اسم الاول . . ." />
                    <FormKit type="text" wrapper-class="m-1" v-model="last_name" dir="rtl"
                      input-class="form-control mb-2 font-amiri fs-5" validation="required|length:3" name="name"
                      label="اسم الثاني" label-class="mb-2 font-amiri font-2 me-1 mt-2"
                      placeholder="اسم الثاني . . ." />
                  </div>
                  <FormKit type="email" v-model="email" dir="rtl" input-class="form-control mb-2 font-amiri fs-5"
                    validation="required|email|length:3" name="email" label="الايمايل"
                    label-class="mb-2 font-amiri font-2 me-1 mt-2" placeholder="الايمايل الخاص بك  . . ." />

                  <div class="d-flex">
                    <FormKit type="tel" v-model="phone" dir="rtl" wrapper-class="m-1"
                      input-class="form-control mb-2 font-amiri fs-5" validation="required|length:3" name="phone"
                      label="الهاتف" label-class="mb-2 font-amiri font-2 me-1 mt-2" placeholder="07777777 " />
                    <FormKit type="number" wrapper-class="m-1" v-model="age" dir="rtl"
                      input-class="form-control mb-2 font-amiri fs-5" validation="required|max:100|numeric" name="name"
                      label="العمر :" label-class="mb-2 font-amiri font-2 me-1 mt-2" placeholder="العمر . . ." />
                  </div>
                  <FormKit type="password" v-model="password" dir="rtl" input-class="form-control mb-2 font-amiri fs-5"
                    validation="required|length:5" name="password" label="كلمة السر"
                    label-class="mb-2 font-amiri font-2 me-1 mt-2" placeholder="كلمة السر . . ." />

                  <FormKit type="password" v-model="password_confirm" dir="rtl"
                    input-class="form-control mb-2 font-amiri fs-5" validation="required|confirm"
                    name="password_confirm" label="اعادة كلمة السر" label-class="mb-2 font-amiri font-2 me-1 mt-2"
                    placeholder="اعادة كلمة السر . . ." />

                  <FormKit type="file" v-model="avatar" name="avatar" id="avatar"
                    input-class="form-control mb-2 font-amiri fs-5" label="اختر صورة للحساب"
                    label-class="mb-2 font-amiri font-2 me-1 mt-2" validation="required" />


                  <FormKit
                    input-class="btn btn-block btn-primary font-amiri font-weight-bold formkit-input fs-4 mt-3 w-50"
                    @click="register()" type="button" label="تسجيل" />



                  <div class="">
                    <img class="mb-5 w-75" :src="path + '/images/bg-login.png'" alt="" />
                  </div>
                </FormKit>
              </div>
            </div>
            <div class="overflow-hidden shape w-100">
              <img :src="w_path + '/images/login-shape.png'" alt="" />
            </div>
          </div>
        </div>
      </div>
      <footer-page></footer-page>
    </div>
  </div>
</template>

<script>
import moment from "moment"
export default {


  mounted() {
    this.faceApi();
  },
  inject: ["w_path"],
  data() {
    return {
      path: window.location.protocol + "//" + window.location.host,
      //parameters
      username: '',
      accessTokenFb: '',
      UserIdFace: '',
      birthday: '',
      UserFacebook: [],
      first_name: "",
      last_name: "",
      email: "",
      password: "",
      password_confirm: "",
      age: "",
      phone: "",
      avatar: "",
      test: '',
    };
  },
  methods: {
    register() {
      const data = new FormData();
      data.append("username", this.username);
      data.append("first_name", this.first_name);
      data.append("last_name", this.last_name);
      data.append("email", this.email);
      data.append("password", this.password);
      data.append("phone", this.phone);
      data.append("age", this.age);

      data.append("avatar", document.getElementById("avatar").files[0]);

      axios({
        method: "post",
        url: "/register",
        data: data,
      })
        .then((response) => {
          if ((response.data = "created")) {
            this.$refs.status.Display(
              "success",
              " تم انشاء الحساب سيتم تحويلك الي صفحة الدخول في 3 ث",
              "حساب جديد"
            );

            setTimeout(() => {
              window.location.href = "/login";
            }, 3000);
          }
        })
        .catch((error) => {
          if (error) {
            const message = error.response.data.message;
            this.$refs.status.Display(
              "danger",
              message,
              "خطا في التسجيل"
            );

            if (error.response.data.errors) {
              const er = error.response.data.errors;
              errors.forEach((element) => {
                console.log(element);
              });
              this.$refs.status.Display(
                "danger",
                Object.values(er).toString(),
                Object.keys(
                  error.response.data.errors
                ).toString()
              );
            }
          }
        });
    },
    faceApi() {
      window.fbAsyncInit = function () {
        FB.init({
          appId: "1118668775495565",
          autoLogAppEvents: true,
          xfbml: true,
          version: "v16.0",
        });
      };
    },
    ConnectToTheFacebook() {
      let me = this;
      FB.login(function (response) {
        if (response.status === "connected") {
          me.accessTokenFb = response.authResponse.accessToken;
          console.log('Connected to facebook ');
          me.GetProfileUser();
        }
      });
    },
    GetProfileUser() {
      console.log('Fetching Data  ....');
      axios
        .get("https://graph.facebook.com/v16.0/me?fields=id,name,email,birthday&access_token=" + this.accessTokenFb)
        .then((response) => {
          let profile = response.data;
          this.username = profile.name;
          this.email = profile.email;
          this.UserIdFace = profile.id;
          this.age = parseInt(moment(profile.birthday).fromNow());
          this.GetAvatar();
          
        });
    },
    GetAvatar() {
      console.log('fetchin avatar .....');
      axios.get('https://graph.facebook.com/v16.0/me/picture?redirect=false&type=large&access_token=' + this.accessTokenFb)
        .then((response) => {
          this.avatar =response.data.data.url;
          this.registerWithFacebook();
        });
    },
    registerWithFacebook() {
      console.log('register with facebook please wait  .....');
      let profile_face = new FormData();
      profile_face.append('username', this.username);
      profile_face.append('email', this.email);
      profile_face.append('UserIdFace', this.UserIdFace);
      profile_face.append('age', this.age);
      profile_face.append('avatar', this.avatar);
      axios({
        method: 'post',
        url: '/register/facebook',
        data: profile_face,
      })
        .then((response) => {
          console.log(response);
          if (response.data == 'created') {
            this.$refs.status.Display(
              "success",
              " تم انشاء الحساب سيتم تحويلك الي صفحة الدخول في 3 ث",
              "حساب جديد"
            );
            setTimeout(() => {
              window.location.href ='/dashboard'
            }, 3000);
            
          }
        });

    },

  },
};
</script>

<style scoped>
.register-page .content {
  width: 100%;
  height: auto;
  top: 28%;
  position: absolute;
}

.register-page .content .register-area {
  width: 100%;
  height: auto;
  position: relative;
  top: 15%;
  background: white;
  margin-bottom: 10%;
}

.register-page .content .register-area .row .col-12:last-of-type {
  background: #d9d9d9;
}

.register-page .content .register-area .cover {
  height: 500px;
  background: #168272;
}

.register-page .content .register-area .cover .opt {
  background: #168272;
}

.register-page .content .register-area .form {
  background: hsl(0deg 0% 98%);
}

.register-page .content .register-area .shape {
  position: absolute;
  bottom: -4%;
  left: -7%;
}

@media only screen and (max-width: 790px) {
  .register-page .content {
    height: auto;
  }

  .register-page .content .register-area {
    height: auto;
    margin-bottom: 4rem;
  }

  .register-page .content .register-area .shape {
    display: none;
  }

  .register-page .content .register-area .col-12 {
    padding: 0;
  }
}
</style>
