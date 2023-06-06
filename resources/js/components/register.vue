<template>
  <div class="register">
    <status ref="status"></status>
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-md-6 position-relative p-d-none-sc">
          <div class="cover-container d-block h-100 position-fixed w-50" dir="rtl">
            <div class="bg-second-color h-100 opacity-75 opt position-absolute w-100">
              <div class="d-flex flex-column h-50 justify-content-center px-5 text">
                <h1 class="fs-1 fw-bold text-white">انضم الينا اليوم واستمتع بالعديد من الوصفات اللذيذة!</h1>
                <div class="fw-bold lh-lg text-white w-75">هل تبحث عن مصدر جيد للوصفات اللذيذة والمميزة؟ إذًا لا داعي
                  للمزيد من البحث! سجل الآن على موقعنا الخاص بالوصفات الطعامية واستمتع بالعديد من المزايا الرائعة. بعد
                  التسجيل، ستتمكن من الوصول إلى مجموعة كبيرة ومتنوعة من الوصفات، بما في ذلك الأطباق الرئيسية والحلويات
                  والمقبلات والمشروبات والمزيد. ستتمكن أيضًا من حفظ وصفاتك المفضلة ومشاركتها مع أصدقائك وعائلتك. وما هو
                  أفضل من ذلك؟ جميع الوصفات على موقعنا تم اختبارها واعتمادها من قبل خبراء الطهي، لذا يمكنك الاعتماد عليها
                  لإعداد وجبات طعام رائعة لعائلتك وضيوفك. لا تفوت هذه الفرصة للاستمتاع بأشهى الوصفات الطعامية وتسجيل
                  الدخول الى عالم الطهي الرائع. انضم الينا اليوم!</div>
              </div>
            </div>
            <div class="img"><img
                src="https://images.unsplash.com/photo-1556911220-bff31c812dba?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1568&amp;q=80"
                alt="" srcset="" class="h-100 w-100"></div>
          </div>
        </div>
        <div class="col-10 col-md offset-1 offset-md-0">
          <div class="back">
            <div class="align-items-center d-flex gap-1 justify-content-end">
              <a href="/" class="first-color fw-bolder text-decoration-none">الرئيسية</a><span
                class="fa fa-arrow-right text-black-title"></span>
            </div>
          </div>
          <div class="form h-100 p-2 pt-3 rounded-right border border-bottom-0 mt-4 shadow" dir="rtl">
            <div class="w-100 border-bottom p-2 text-center">
              <div class="logo text-center">
                <img class="w-25" :src="w_path + '/images/logo.png'" alt="" style="">
              </div>
            </div>
            <FormKit type="form" :actions="false" form-class="d-grid  gap-2 pt-2">
              <FormKit type="text" v-model="username" dir="rtl" input-class="form-control font-amiri fs-5"
                validation="required|length:3" name="username" label="اسم المستعار"
                label-class="mb-2 font-amiri font-2 me-1 " placeholder="اسم المستعار . . ." />

              <div class="d-flex justify-content-between">
                <FormKit type="text" v-model="first_name" dir="rtl" wrapper-class="m-1"
                  input-class="form-control font-amiri fs-5" validation="required|length:3" name="name" label="اسم الاول"
                  label-class="mb-2 font-amiri font-2 me-1" placeholder="اسم الاول . . ." />
                <FormKit type="text" wrapper-class="m-1" v-model="last_name" dir="rtl"
                  input-class="form-control font-amiri fs-5" validation="required|length:3" name="name" label="اسم الثاني"
                  label-class="mb-2 font-amiri font-2 me-1" placeholder="اسم الثاني . . ." />
              </div>
              <FormKit type="email" v-model="email" dir="rtl" input-class="form-control font-amiri fs-5"
                validation="required|email|length:3" name="email" label="الايمايل"
                label-class="mb-2 font-amiri font-2 me-1" placeholder="الايمايل الخاص بك  . . ." />

              <div class="d-flex justify-content-between">
                <FormKit type="tel" v-model="phone" dir="rtl" wrapper-class="m-1"
                  input-class="form-control font-amiri fs-5" validation="required|length:3" name="phone" label="الهاتف"
                  label-class="mb-2 font-amiri font-2 me-1" placeholder="07777777 " />
                <FormKit type="number" wrapper-class="m-1" v-model="age" dir="rtl"
                  input-class="form-control font-amiri fs-5" validation="required|max:100|numeric" name="name"
                  label="العمر :" label-class="mb-2 font-amiri font-2 me-1" placeholder="العمر . . ." />
              </div>
              <FormKit type="password" v-model="password" dir="rtl" input-class="form-control font-amiri fs-5"
                validation="required|length:5" name="password" label="كلمة السر" label-class="mb-2 font-amiri font-2 me-1"
                placeholder="كلمة السر . . ." />

              <FormKit type="password" v-model="password_confirm" dir="rtl" input-class="form-control font-amiri fs-5"
                validation="required|confirm" name="password_confirm" label="اعادة كلمة السر"
                label-class="mb-2 font-amiri font-2 me-1" placeholder="اعادة كلمة السر . . ." />

              <FormKit type="file" v-model="avatar" name="avatar" id="avatar" input-class="form-control font-amiri fs-5"
                label="اختر صورة للحساب" label-class="mb-2 font-amiri font-2 me-1" validation="required" />


              <FormKit input-class="bg-first-color btn font-amiri font-weight-bold fs-4 text-white w-100"
                @click="register()" type="button" label="تسجيل" />
            </FormKit>
            <!-- Login Button facebook -->
            <div
              class="align-items-center bg-primary button-facebook d-flex font-amiri fs-6 fw-bold justify-content-center mx-auto p-2 pointer rounded text-white w-100-sc w-50-perso"
              @click="ConnectToTheFacebook()">
              <img :src="w_path + '/images/faceicon.png'" class="img-fluid mx-2" style="width: 25px;">
              <div class="text">تسجيل عن طريق الفيس بوك</div>
            </div>
            <!--    -->
          </div>

        </div>
      </div>
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
          this.avatar = response.data.data.url;
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
              window.location.href = '/dashboard'
            }, 3000);

          }
        });

    },

  },
};
</script>

<style scoped></style>
