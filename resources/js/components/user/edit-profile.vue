<template>
  <div class="edit-profile">
    <status ref="status"></status>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
          role="tab" aria-controls="profile" aria-selected="true">
          Profile
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button"
          role="tab" aria-controls="security" aria-selected="false">
          Security
        </button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container-xl px-4 mt-4">
          <hr class="mt-0 mb-4" />
          <div class="row">
            <div class="col-xl-4">
              <!-- Profile picture card-->
              <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                  <!-- Profile picture image-->
                  <div class="Avatar w-100">
                    <input type="file" name="avatar" id="avatar" hidden @change="buttonUnable()" />
                    <div class="mx-auto position-relative rounded-circle w-50" @mouseenter="
                      show = 'show_changeAvatar'
                      " @mouseleave="show = ''">
                      <Transition name="fade">
                        <div class="h-100 position-absolute rounded-circle w-100" v-show="show ==
                          'show_changeAvatar'
                          " style="
                                                        background: #28937e1c;
                                                    ">
                          <a href="#"
                            class="end-0 fw-bolder position-absolute text-decoration-none text-white top-50 w-100"
                            @click="getAvatar()">Change avatar</a>
                        </div>
                      </Transition>
                      <img class="img-account-profile rounded-circle mb-2 w-100" :src="w_path +
                        '/storage/' +
                        this.avatar
                        " alt="" />
                    </div>
                  </div>
                  <!-- Profile picture help block-->
                  <div class="small font-italic text-muted mb-4">
                    JPG or PNG no larger than 5 MB
                  </div>
                  <!-- Profile picture upload button-->

                  <button class="btn btn-primary mt-2" id="UploadAvatar" disabled @click="ChangeAvatar()" type="button">
                    صورة جديدة
                  </button>
                </div>
              </div>
            </div>
            <div class="col-xl-8" dir="rtl">
              <!-- Account details card-->
              <div class="card mb-4">
                <div class="card-header">
                  {{ $t("labels.Account_Details") }}
                </div>
                <div class="card-body">
                  <form>
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                      <label class="small mb-1" for="inputUsername">{{
                        $t("labels.username")
                      }}
                        (كيف سيظهر اسمك للمستخدمين
                        الآخرين على الموقع )</label>
                      <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username"
                        v-model="username" />
                      <span class="text-danger">يمكنك تغيير اسم المستخدم مرة
                        واحدة
                      </span>
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                      <!-- Form Group (first name)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">{{
                          $t("labels.first_name")
                        }}</label>
                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name"
                          v-model="first_name" />
                      </div>
                      <!-- Form Group (last name)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputLastName">{{
                          $t("labels.last_name")
                        }}</label>
                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name"
                          v-model="last_name" />
                      </div>
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                      <label class="small mb-1" for="inputEmailAddress">{{ $t("labels.email") }}</label>
                      <input class="form-control" id="inputEmailAddress" type="email"
                        placeholder="Enter your email address" v-model="email" />
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                      <!-- Form Group (phone number)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputPhone">{{
                          $t("labels.phone")
                        }}</label>
                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number"
                          v-model="phone" />
                      </div>
                      <!-- Form Group (birthday)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputBirthday">{{
                          $t("labels.age")
                        }}</label>
                        <input class="form-control" id="inputBirthday" type="text" name="birthday"
                          placeholder="Enter your birthday" v-model="age" />
                      </div>
                    </div>
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="button" @click="UpdateInfo()">
                      {{ $t("labels.save_change") }}
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- tab security -->
      <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
        <div class="container-xl px-4 mt-4">
          <hr class="mt-0 mb-4" />
          <div class="row">
            <div class="col-lg-8">
              <!-- Change password card-->
              <div class="card mb-4">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                  <form>
                    <!-- Form Group (current password)-->
                    <div class="mb-3">
                      <FormKit type="password" id="currentPassword" v-model="currentPassword"
                        :label="$t('labels.currentPassword')" label-class="small mb-1" input-class="form-control"
                        :placeholder="$t('labels.currentPassword')" />
                    </div>
                    <!-- Form Group (new password)-->
                    <FormKit type="group">
                      <div class="mb-3">
                        <FormKit type="password" name="password" v-model="newPassword" :label="$t('labels.newPassword')
                          " label-class="small mb-1" input-class="form-control"
                          :placeholder="$t('labels.newPassword')" />
                      </div>
                      <!-- Form Group (confirm password)-->
                      <div class="mb-3">
                        <FormKit type="password" name="password_confirm" validation="confirm" v-model="confirmPassword"
                          validation-visibilty="live" :label="$t('labels.confirmPassword')" label-class="small mb-1"
                          input-class="form-control" :placeholder="$t('labels.confirmPassword')" />
                      </div>
                    </FormKit>
                    <button class="btn btn-primary" @click="changePassword()" type="button">
                      حفظ
                    </button>
                  </form>
                </div>
              </div>
              <!-- Security preferences card-->
              <div class="card mb-4">
                <div class="card-header">
                  Security Preferences
                </div>
                <div class="card-body">
                  <!-- Account privacy optinos-->
                  <h5 class="mb-1">Account Privacy</h5>
                  <p class="small text-muted">
                    By setting your account to private, your
                    profile information and posts will not
                    be visible to users outside of your user
                    groups.
                  </p>
                  <form>
                    <div class="form-check">
                      <input class="form-check-input" id="radioPrivacy1" type="radio" name="radioPrivacy" checked="" />
                      <label class="form-check-label" for="radioPrivacy1">Public (posts are available to
                        all users)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" id="radioPrivacy2" type="radio" name="radioPrivacy" />
                      <label class="form-check-label" for="radioPrivacy2">Private (posts are available to
                        only users in your
                        groups)</label>
                    </div>
                  </form>
                  <hr class="my-4" />
                  <!-- Data sharing options-->
                  <h5 class="mb-1">Data Sharing</h5>
                  <p class="small text-muted">
                    Sharing usage data can help us to
                    improve our products and better serve
                    our users as they navigation through our
                    application. When you agree to share
                    usage data with us, crash reports and
                    usage analytics will be automatically
                    sent to our development team for
                    investigation.
                  </p>
                  <form>
                    <div class="form-check">
                      <input class="form-check-input" id="radioUsage1" type="radio" name="radioUsage" checked="" />
                      <label class="form-check-label" for="radioUsage1">Yes, share data and crash
                        reports with app
                        developers</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" id="radioUsage2" type="radio" name="radioUsage" />
                      <label class="form-check-label" for="radioUsage2">No, limit my data sharing with
                        app developers</label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- Delete account card-->
              <div class="card mb-4">
                <div class="card-header">Delete Account</div>
                <div class="card-body">
                  <p>
                    Deleting your account is a permanent
                    action and cannot be undone. If you are
                    sure you want to delete your account,
                    select the button below.
                  </p>
                  <button class="btn btn-danger-soft text-danger" @click="deleteAccount()" type="button">
                    I understand, delete my account
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  inject: ["w_path"],
  mounted() {
    this.getUser(this.$attrs.auth_id);
  },
  activated() {
    this.getUser(this.$attrs.auth_id);
  },
  data() {
    return {
      username: "",
      name: "",
      first_name: "",
      last_name: "",
      email: "",
      phone: "",
      age: "",
      show: "",
      avatar: "",
      currentPassword: "",
      newPassword: "",
      confirmPassword: "",
    };
  },
  methods: {
    getUser(id) {
      //   const data = new FormData();
      //   data.append(this.username, this.username);
      axios
        .get("user/user/" + id + "/edit")
        .then((response) => {
          console.log(response.data.profile);
          if (response.data) {
            this.username = response.data.profile.username;
            this.first_name = response.data.profile.first_name;
            this.last_name = response.data.profile.last_name;
            this.email = response.data.profile.email;
            this.phone = response.data.profile.phone;
            this.age = response.data.profile.age;
            this.avatar = response.data.profile.avatar;
          }
        })
        .catch((error) => { });
    },

    UpdateInfo() {
      let data = new FormData();
      data.append("username", this.username);
      data.append("name", this.name);
      data.append("first_name", this.first_name);
      data.append("last_name", this.last_name);
      data.append("email", this.email);
      data.append("phone", this.phone);
      data.append("age", this.age);
      data.append("user_id", this.$attrs.auth_id);
      data.append("_method", "PUT");
      // data.append("avatar", document.getElementById('avatar').files[0]);
      axios.post("/user/user/" + this.$attrs.auth_id, data)
        .then((response) => {
          if (response.data) {
            if (response.data == "updated") {
              this.$refs.status.Display(
                "success",
                " تم تحديث المعلومات الخاص بك بنجاح سيتم تحديث الصفحة في 2 ث ",
                "تحديث"
              );
             setTimeout(() => {
              window.location.reload();
             }, 2000);
              this.getUser(this.$attrs.auth_id);
            }
          }
        })
        .catch((error) => {
          this.$refs.status.Display('danger', error.response.data.message, 'status', 'stop');
          
        });
    },
    getAvatar() {
      document.getElementById("avatar").click();
    },
    buttonUnable() {
      if (document.getElementById("avatar").files.length !== 0) {
        document.getElementById("UploadAvatar").disabled = false;
      } else {
        document.getElementById("UploadAvatar").disabled = true;
      }
    },
    ChangeAvatar() {
      const avatar = document.getElementById("avatar").files;
      if (avatar.length !== 0) {
        const data = new FormData();
        data.append("update_avatar", true);
        data.append("prev_avatar", this.avatar);
        data.append("new_avatar", avatar[0]);

        axios({ method: "POST", url: "user/avatar", data: data })
          .then((response) => {
            if (response.data) {
              if (response.data == "updated") {
                this.$refs.status.Display(
                  "success",
                  " تم تحديث الصورة بنجاح",
                  "تحديث"
                );
                this.getUser(this.$attrs.auth_id);
              }
            }
          })
          .catch((error) => { });
      }
    },

    changePassword() {
      const data = new FormData();
      data.append("currentPassword", this.currentPassword);
      data.append("newPassword", this.newPassword);
      data.append("confirmPassword", this.confirmPassword);
      axios({ method: "post", url: "user/password", data: data })
        .then((response) => {
          if (response.data == "updated") {
            this.$refs.status.Display(
              "success",
              " تم تغيير كلمة المرور بنجاح",
              "تحديث"
            );
          }
          this.newPassword = "";
          this.currentPassword = "";
          this.confirmPassword = "";
        })
        .catch((error) => {
          this.$refs.status.Display(
            "danger",
            Object.values(error.response.data.errors).toString(),
            "خطا"
          );
        });
    },
    deleteAccount() {
      let data = new FormData();
      data.append("user_id", this.$attrs.auth_id);
      data.append("_method", "DELETE");
      axios
        .post("user/user/" + this.$attrs.auth_id, data)
        .then((response) => {
          if (response.data.status == "Deleted") {
            this.$refs.status.Display(
              response.data.style,
              response.data.message,
              response.data.status,
              response.data.icon
            );
            setTimeout(() => {
              window.location.href = "/home";
            }, 3000);
          }
        })
        .catch((error) => { });
    },
  },
};
</script>

<style scoped>
.edit-profile .img-account-profile {
  height: 10rem;
}

.edit-profile .fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.edit-profile .fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.rounded-circle {
  border-radius: 50% !important;
}

.edit-profile .card {
  box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}

.edit-profile .card .card-header {
  font-weight: 500;
}

.edit-profile .card-header:first-child {
  border-radius: 0.35rem 0.35rem 0 0;
}

.edit-profile .card-header {
  padding: 1rem 1.35rem;
  margin-bottom: 0;
  background-color: rgba(33, 40, 50, 0.03);
  border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}

.edit-profile form-control,
.edit-profile .dataTable-input {
  display: block;
  width: 100%;
  padding: 0.875rem 1.125rem;
  font-size: 0.875rem;
  font-weight: 400;
  line-height: 1;
  color: #69707a;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #c5ccd6;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.35rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.edit-profile .nav-borders .nav-link.active {
  color: #0061f2;
  border-bottom-color: #0061f2;
}

.edit-profile .nav-borders .nav-link {
  color: #69707a;
  border-bottom-width: 0.125rem;
  border-bottom-style: solid;
  border-bottom-color: transparent;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
  padding-left: 0;
  padding-right: 0;
  margin-left: 1rem;
  margin-right: 1rem;
}
</style>
