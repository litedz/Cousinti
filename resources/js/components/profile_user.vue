<template>
  <div class="bg-white container emp-profile shadow">
    <status ref="status"></status>
    <form method="post">
      <div class="row">
        <div class="col-md-4">
          <div class="profile-img">
            <img :src="w_path + '/storage/' + profile.avatar" alt="" class="w-100" />
            <div class="file btn btn-lg btn-primary" v-if="this.$attrs.edit_perm">
              Change Photo
              <input type="file" name="file" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="profile-work">
                <p class="text-uppercase">social media</p>
                <a href="">Website Link</a><br />
                <a href="">Bootsnipp Profile</a><br />
                <a href="">Bootply Profile</a>
                <p>SKILLS</p>
                <a href="">Web Designer</a><br />
                <a href="">Web Developer</a><br />
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="profile-head text-warning">
            <h5>
              {{ profile.username }}
            </h5>
            <h6>
              {{ profile.rank.rank }}
            </h6>
            <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                  aria-selected="true">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Recipes" role="tab" aria-controls="profile"
                  aria-selected="false">Latest Recipe</a>
              </li>
            </ul>
          </div>
          <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <div class="col-8" v-if="this.ProfileInfo.setting.about">
                  <div class="about-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam rerum facere est nam repellat! Itaque
                    quisquam obcaecati laborum minus. Quam sunt ea ratione corporis necessitatibus tempora dolore alias
                    pariatur magnam?
                  </div>
                </div>
                <div class="col-12 text-center" v-else>
                  <h1 class="text-muted text-capitalize">This Section Is private</h1>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="Recipes" role="tabpanel" aria-labelledby="Recipes-tab">
              <div class="g-3 row">
                <div class="col-4" v-if="this.ProfileInfo.setting.recipes">
                  <div class="img-container flex-center position-relative w-100 h-100">
                    <div class="overlay w-100 position-absolute h-100 bg-black"></div>
                    <div class="link-recipe position-absolute text-center text-truncate w-75 z-8888">
                      <a href="/recipe" class="bg-white first-color fs-3 p-2 px-4 rounded w-50">Recipe Name
                        azazazeeeeeee</a>
                    </div>
                    <img class="w-100" src="https://picsum.photos/200/300" alt="">
                  </div>
                </div>
                <div class="col-12 text-center" v-else>
                  <h1 class="text-muted text-capitalize">private Recipes</h1>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="flex-center gap-2">
            <input type="button" class="profile-edit-btn px-3 p-1" name="btnAddMore" value="Edit Profile"
              v-if="this.$attrs.edit_perm" @click="EditForm = true" />
          </div>
        </div>
        <div class="col-md-2">

        </div>
      </div>

    </form>
    <!-- <div class="position-fixed btn-primary btn top-50 w-100" @click="ss()">Click</div> -->
    <form-message v-show="showChat" :user_id_recipient="this.profile.id" :user_id_send="this.auth_id"
      @Close-Chat="showChat = false"></form-message>

    <!-- Edit profile Form  -->
    <Transition name="fade">
      <div class="bg-light border p-3 position-fixed pt-5 rounded tab-pane w-50 z-9999" style="left: 25%;top: 20%;"
        v-show="EditForm">
        <div class="tab-pane" id="edit">
          <form class="d-grid gap-3">
            <div class="form-group row">
              <label class="col-lg-2 fw-bolder text-black-title col-form-label form-control-label">الاسم</label>
              <div class="col-lg-9">
                <input class="form-control" type="text" v-model="ProfileInfo.name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-2 fw-bolder text-black-title col-form-label form-control-label">تغيير صورة
                البروفايل</label>
              <div class="col-lg-9">
                <input class="form-control" type="file" id="avatar">
              </div>
            </div>
            <div class="Setting d-grid gap gap-2">
              <div class="border-bottom h4 p-1 rounded text-black-title title">خيارات البروفايل</div>
              <!-- Default checked -->
              <div class="d-flex form-check form-switch row-cols-4">
                <label class="form-check-label fw-semibold" for="flexSwitchCheckChecked">عرض اخر الوصفات</label>
                <input v-model="ProfileInfo.setting.recipes" class="form-check-input" type="checkbox" role="switch"
                  id="flexSwitchCheckChecked1" :checked="ProfileInfo.setting.recipes == 1">
              </div>
              <div class="d-flex form-check form-switch row-cols-4">
                <label class="form-check-label fw-semibold" for="flexSwitchCheckChecked">عرض الوصف</label>
                <input v-model="ProfileInfo.setting.about" class="form-check-input" type="checkbox" role="switch"
                  id="flexSwitchCheckChecked" :checked="ProfileInfo.setting.about == 1">
              </div>
              <input type="button" class="btn btn-primary mx-1 col-12 col-md-2" value="حفط التفيير"
                @click="UpdatePermissions()">
            </div>



            <div class="border-top form-group pt-2 row">
              <div class="col-lg-9">
                <input type="button" class="btn btn-secondary mx-1" value="Cancel" @click="EditForm = false">
                <input type="button" class="btn btn-primary mx-1" value="Save Changes" @click="EditProfileUser()">
              </div>
            </div>
          </form>
        </div>
      </div>
    </Transition>
  </div>
</template>

<script>
import moment from "moment";
export default {
  props: { profile: Object, auth_id: Number },
  inject: ['w_path'],
  mounted() {
    this.ProfileInfo.name = this.profile.username;
    this.ProfileInfo.setting.recipes = this.profile.profile_setting.show_recipes_perm;
    this.ProfileInfo.setting.about = this.profile.profile_setting.show_about_perm;
    this.ProfileInfo.comments = this.profile.comments;
    window.addEventListener('mousemove', this.ss);

  },
  watch: {
    ProfileInfo: {
      handler(val) {
        this.ProfileInfo.setting.recipes = (this.ProfileInfo.setting.recipes == true ? 1 : 0);
        this.ProfileInfo.setting.about = (this.ProfileInfo.setting.about == true ? 1 : 0);
      },
      deep: true
    },
    // showChat: {
    //   handler() {
    //     if (this.showChat) {
    //       this.ss();
    //     }
    //   }
    // },
  },
  data() {
    return {
      EditForm: false,
      showChat: false,
      show: '',
      ProfileInfo: {
        name: '',
        setting: {
          recipes: '',
          about: '',
        },
        comments: '',
      },
    };
  },
  methods: {
    ss() {
      let body = document.querySelector('.card-body');
      body.scrollTop = body.scrollHeight;
    },
    RemoveScrolle() {
      window.removeEventListener('mouseenter', this.ss)
      alert();
    },
    getProfileInfo() {
      axios({
        method: 'get',
        url: '/profile/' + this.auth_id + '/edit',

      }).then((response) => {
        if (response.data) {
          console.log(response.data);
          this.ProfileInfo.name = response.data.info.username;
          this.ProfileInfo.background = response.data.info.profile_setting.background;
        }

      }).catch((error) => {
        console.log(error.response);
        this.$refs.status.Display('danger', error.response.data.message, 'خطاء');
      });
    },

    EditProfileUser() {
      let info = new FormData();
      let avatarProfile = document.getElementById('avatar').files[0];
      info.append('username', this.ProfileInfo.name);
      if (avatarProfile !== undefined) {
        info.append('avatar', avatarProfile);
      }
      info.append('background', this.ProfileInfo.background);
      info.append('_method', 'PUT');
      axios({
        method: 'POST',
        url: '/profile/' + this.auth_id,
        data: info,
      }).then((response) => {
        if (response.data.status == 'updated') {
          this.$refs.status.Display('success', response.data.message, 'تمت التحديث بنجاح');
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        }

      }).catch((error) => {
        console.log(error.response);
        this.$refs.status.Display('danger', error.response.data.message, 'خطاء');
      });
    },
    UpdatePermissions() {
      let setting = new FormData();
      setting.append('show_about_perm', this.ProfileInfo.setting.about);
      setting.append('show_recipes_perm', this.ProfileInfo.setting.recipes);
      setting.append('_method', 'PUT');
      axios({
        method: 'POST',
        url: '/profile/' + this.auth_id + '/edit/permission',
        data: setting,
      }).then((response) => {
        if (response.data.status == 'updated') {
          this.$refs.status.Display('success', response.data.message, 'تمت التحديث بنجاح');
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        }
      }).catch((error) => {
        this.$refs.status.Display('danger', error.response.data.message, 'خطاء');
      });;
    },
    formateDate(created_at) {
      return moment(created_at, false).fromNow();
    },
    recipesUser() {
      axios({
        method: 'get',
        url: '/profile/' + this.auth_id + '/edit',

      }).then((response) => {
        if (response.data) {

        }

      }).catch((error) => {
        this.$refs.status.Display('danger', error.response.data.message, 'خطاء');
      });
    },

  }
}
</script>

<style scoped>
.emp-profile {
  padding: 3%;
  margin-top: 3%;
  margin-bottom: 3%;
  border-radius: 0.5rem;
  background: #fff;
}

.profile-img {
  text-align: center;
}



.profile-img .file {
  position: relative;
  overflow: hidden;
  margin-top: -20%;
  width: 70%;
  border: none;
  border-radius: 0;
  font-size: 15px;
  background: #212529b8;
}

.profile-img .file input {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}

.profile-head h5 {
  color: #333;
}

.profile-head h6 {
  color: #0062cc;
}

.profile-edit-btn {
  border: none;
  border-radius: 1.5rem;
  width: 70%;
  padding: 2%;
  font-weight: 600;
  color: #6c757d;
  cursor: pointer;
}

.proile-rating {
  font-size: 12px;
  color: #818182;
  margin-top: 5%;
}

.proile-rating span {
  color: #495057;
  font-size: 15px;
  font-weight: 600;
}

.profile-head .nav-tabs {
  margin-bottom: 5%;
}

.profile-head .nav-tabs .nav-link {
  font-weight: 600;
  border: none;
  color: #EF6F82;
}

.nav-tabs .nav-link.active:after {
  background-color: #ef6f82;
  box-shadow: 0 2px 5px #ef6f82;
}

.profile-head .nav-tabs .nav-link.active {
  border: none;
  border-bottom: 2px solid #ef6f82;
}

.profile-work {
  padding: 14%;
  margin-top: -15%;
}

.profile-work p {
  font-size: 12px;
  color: #818182;
  font-weight: 600;
  margin-top: 10%;
}

.profile-work a {
  text-decoration: none;
  color: #495057;
  font-weight: 600;
  font-size: 14px;
}

.profile-work ul {
  list-style: none;
}

.profile-tab label {
  font-weight: 600;
}

.profile-tab p {
  font-weight: 600;
  color: #0062cc;
}

#Recipes .img-container .overlay {
  opacity: 0;
}

#Recipes .img-container .link-recipe {
  opacity: 0;
}

#Recipes .img-container:hover .overlay {
  opacity: 0.5;
  transition: all 0.5s;
}

#Recipes .img-container:hover .link-recipe {
  opacity: 1;
  transition: all 0.5s;
}
</style>