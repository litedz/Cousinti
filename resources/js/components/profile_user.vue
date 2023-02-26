<template>
  <section class="h-100 gradient-custom-2 profile" style="direction: rtl;">
    <status ref="status"></status>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100 ">
        <div class="col col-lg-9 col-xl-7">
          <div class="card">
            <div class="rounded-top px-4 text-white d-flex flex-row"
              :style="'background-color:' + profile.profile_setting.background + '; height:200px;'">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img v-if="profile.Id_user_media == null" :src="w_path + '/storage/' + profile.avatar"
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mb-2 mt-4 z-9999"
                  style="width: 150px;height: 150px; z-index: 1">

                <img v-else :src="profile.avatar" alt="Generic placeholder image"
                  class="img-fluid img-thumbnail mb-2 mt-4 z-9999" style="width: 150px;height: 150px; z-index: 1">

                <button v-if="$attrs.edit_perm == 1" type="button" class="btn btn-outline-dark"
                  data-mdb-ripple-color="dark" style="z-index: 1;" @click="EditForm = true">
                  Edit profile
                </button>
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5>{{ profile.username }}</h5>
                <p>New York</p>
              </div>
            </div>
            <div class="p-4 text-black" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <p class="mb-1 h5">{{ profile.recipes.length }}</p>
                  <p class="small text-muted mb-0">Recipes</p>
                </div>
                <div class="px-3">
                  <p class="mb-1 h5">1026</p>
                  <p class="small text-muted mb-0">Followers</p>
                </div>
                <div>
                  <p class="mb-1 h5">478</p>
                  <p class="small text-muted mb-0">Following</p>
                </div>
              </div>
            </div>
            <div class="card-body p-4 text-black Recent recipes">
              <!-- <div class="mb-5">
                                    <p class="lead fw-normal mb-1">About</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                      <p class="font-italic mb-1">Web Developer</p>
                                      <p class="font-italic mb-1">Lives in New York</p>
                                      <p class="font-italic mb-0">Photographer</p>
                                    </div>
                                  </div> -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">اخر الوصفات</p>
                <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
              </div>
              <div class="no-recipe" v-if="profile.recipes.length == 0">
                <div class="bg-light fs-4 fw-lighter p-3 rounded text-center text-muted">لا يوجد وصفات</div>
              </div>
              <div class="" v-else-if="ProfileInfo.setting.recipes == 'false' || ProfileInfo.setting.recipes == 0">
                <div class="bg-light fs-4 fw-lighter p-3 rounded text-center text-muted">تم حجب الوصفات</div>
              </div>
              <div class="row">
                <div class="col-6 mb-2 p-0 position-relative singel-recipe" v-for="images in profile.recipes"
                  @mouseenter="show = 'RecipeTitle'" @mouseleave="show = ' '"
                  v-if="profile.profile_setting.recipes == 'true'">
                  <Transition name="fade">
                    <div class="bg-perso fs-1 h-100 position-absolute position-relative rounded-3 text-center w-100"
                      v-show="show == 'RecipeTitle'">
                      <a class="position-relative text-decoration-none text-white" style="top: 30%;" href="#">Titlt
                      </a>
                    </div>
                  </Transition>
                  <img v-if="images.images_recipe[0]" :src="w_path + '/storage/recipes/' + images.images_recipe[0].name"
                    alt="image 1" class="w-100 rounded-3">
                </div>
              </div>
            </div>
            <div class="Recent Activity">
              <div class="lead mb-2 mx-4 title">النشاط الأخير</div>
              <hr>
              <div v-if="ProfileInfo.setting.last_activity == 'false' || ProfileInfo.setting.last_activity == 0">
                <div class="bg-light fs-4 fw-lighter p-3 rounded text-center text-muted">تم حجب النشاطات</div>
              </div>
              <div v-else class="Activitys mx-0 p-3 rounded row w-100">
                <div class="bg-light col-12 d-flex flex-column fs-6 p-2">
                  <span class="fa fa-comments mb-2" style="color: #3fcccc;"></span>
                  <div class="d-flex fs-5 mb-2 text">
                    <div class="fw-bolder ms-2 pointer text-black-title username" style="color: #636060;">sakijujegy</div>
                    <div class="ms-3">اضاف تعليق :</div>
                    <div class="comment text-truncate w-25">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae
                      numquam autem odit iure ullam excepturi. Laborum incidunt ab, fugiat alias esse recusandae fugit
                      sequi a autem quisquam ut, nemo culpa?</div>
                  </div><span class="position-relative text-info time">17h ago</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Transition name="fade">
      <!-- Edit profile Form  -->

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
            <div class="form-group row">
              <label class="col-lg-2 fw-bolder text-black-title col-form-label form-control-label">تغيير الخلفية</label>
              <div class="col-lg-9">
                <input class="form-control w-25" type="color" v-model="ProfileInfo.background">
              </div>
            </div>
            <div class="Setting d-grid gap gap-2">
              <div class="border-bottom h4 p-1 rounded text-black-title title">خيارات البروفايل</div>
              <!-- Default checked -->
              <div class="d-flex form-check form-switch row-cols-4">
                <label class="form-check-label fw-semibold" for="flexSwitchCheckChecked">عرض اخر الوصفات</label>
                <input v-model="ProfileInfo.setting.recipes" class="form-check-input" type="checkbox" role="switch"
                  id="flexSwitchCheckChecked1" :checked="ProfileInfo.setting.recipes == true">
              </div>
              <div class="d-flex form-check form-switch row-cols-4">
                <label class="form-check-label fw-semibold" for="flexSwitchCheckChecked">عرض اخر النشاطات</label>
                <input v-model="ProfileInfo.setting.last_activity" class="form-check-input" type="checkbox" role="switch"
                  id="flexSwitchCheckChecked" :checked="ProfileInfo.setting.last_activity == true">
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
  </section>
</template>

<script>
export default {
  props: { profile: Object, user_id: Number },
  inject: ['w_path'],
  mounted() {
    this.ProfileInfo.name = this.profile.username;
    this.ProfileInfo.background = this.profile.profile_setting.background;
    this.ProfileInfo.setting.recipes = this.profile.profile_setting.recipes;
    this.ProfileInfo.setting.last_activity = this.profile.profile_setting.last_activity;

  },
  data() {
    return {
      EditForm: false,
      show: '',
      ProfileInfo: {
        name: '',
        background: '',
        setting: {
          recipes: '',
          last_activity: '',
        }
      }
    };
  },
  methods: {
    getProfileInfo() {
      axios({
        method: 'get',
        url: '/profile/' + this.user_id + '/edit',

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
        url: '/profile/' + this.user_id,
        data: info,
      }).then((response) => {
        if (response.data.status == 'updated') {
          this.$refs.status.Display('success', 'تم تحديث البروفايل', 'تمت التحديث بنجاح');
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
      setting.append('last_activity', this.ProfileInfo.setting.last_activity);
      setting.append('recipes', this.ProfileInfo.setting.recipes);
      setting.append('_method', 'PUT');
      axios({
        method: 'POST',
        url: '/profile/' + this.user_id + '/edit/permission',
        data: setting,
      }).then((response) => {
        if (response.data.status == 'updated') {
          this.$refs.status.Display('success', 'تم تحديث البروفايل', 'تمت التحديث بنجاح');
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        }
      }).catch((error) => {
        this.$refs.status.Display('danger', error.response.data.message, 'خطاء');
      });;
    },

  }
}
</script>

<style scoped>
.btn-outline-dark {
  background: #0E8572;
  border: none;
  color: white;
}


/* .singel-recipe: div:first-of-type {
  transition: all 1s;
  animation: fadeIn-custome 1s;
} */
/* 
@keyframes fadeIn-custome {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 0.75;
  }
} */
</style>