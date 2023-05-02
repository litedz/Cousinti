<template>
    <div class="bg-first-color top-area w-100 h-auto" style="z-index: 9999" id="nav-dashboard">
        
        <div class="container-fluid align-items-center d-flex justify-content-between">
            <div class="auth w-100">
                <div class="info d-flex flex-row-reverse justify-content-start align-items-center">
                    <!-- authentication  with facebook user -->
                    <div class="" v-if="this.$attrs.auth_status == true && this.$attrs.checkmediauser == true">
                        <img :src="this.$attrs.avatar" style="width: 50px;height: 50px;" alt="avatar"
                            class="rounded-circle m-2" />
                    </div>
                    <!-- authentication  with Laravel App -->
                    <div class="" v-if="this.$attrs.auth_status == true && this.$attrs.checkmediauser == false">
                        <a :href="w_path + '/profile/' + this.$attrs.user_id">
                            <img :src="w_path + '/storage/' + this.$attrs.avatar" style="width: 50px;height: 50px;"
                                alt="avatar" class="rounded-circle m-2" /></a>
                    </div>
                    <div class="dashboard mx-3 position-relative text-right w-auto" v-if="this.$attrs.auth_status == true">
                        <div class="" v-if="this.$attrs.auth_status == true">
                            <div class="name text-truncate" v-if="this.$attrs.user !== undefined">
                                <a href="/dashboard" class="text-decoration-none fs-6 fst-italic fw-bolder text-white">{{
                                    this.$attrs.user }}</a>
                            </div>
                        </div>

                        <a class="fa fa-bars-staggered fs-4 text-white pointer text-decoration-none" @click="toggleMenu()"
                            data-link="quick-menu" data-toggle="navSlide"></a>
                        <div class="bg-white end-0 quick-menu p-3 position-absolute text-center rounded shadow" id="quick-menu">
                            <li class="head fw-bolder">Quick Menu</li>
                            <li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded">
                                <a href="/dashboard" class="text-decoration-none first-color">لوحة التحكم</a><span
                                    class="fa fa-dashboard fs-6 m-2 first-color"></span>
                            </li>
                            <li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded">
                                <a href="/recipes" class="text-decoration-none first-color">الوصفات</a><span
                                    class="fs-6 m-2 fa fa-list first-color"></span>
                            </li>
                            <li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded">
                                <a href="#" class="text-decoration-none first-color" @click="showWishList = true">المفضلة</a><span
                                    class="fs-6 m-2 fa fa-heartbeat first-color"></span>
                            </li>
                            <li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded">
                                <a href="/logout" class="text-decoration-none first-color">الخروج</a><span
                                    class="fa fa-door-open fs-6 m-2 first-color"></span>
                            </li>
                        </div>
                    </div>
                    <div class="d-flex align-items-center w-100 position-relative">
                        <span
                            class="bg-dark fa fa-search m-1 p-2 rounded-circle text-white position-absolute start-0"></span>
                        <input class="form-control font-amiri w-100" type="search" placeholder="البحث عن وصفة  . . ."
                            name="search" v-on:keyup="search()" dir="rtl" v-model="text_search" />
                        <div class="search-found z-9999" style="">
                            <div class="recipes bg-light d-flex flex-column position-absolute rounded start-0 top-100 w-100 p-3"
                                v-if="recipes_found.length !== 0" dir="rtl" style="height: 250px; overflow-y: auto">
                                <div class="bg-light border-bottom d-flex mt-1 pb-2" v-for="recipe in recipes_found"
                                    :key="recipe.found">
                                    <div class="image w-25">
                                        <a href="#">
                                            <img class="rounded w-100"
                                                :src="w_path + '/storage/' + recipe.author.id + '/' + recipe.images_recipe[0].name"
                                                alt="" /></a>
                                    </div>
                                    <div class="info-recipe d-flex flex-column mx-3 w-100">
                                        <div class="title fw-bolder">
                                            <a href="#" class="text-decoration-none text-black-title">{{ recipe.name }}</a>
                                        </div>
                                        <div class="how_todo text-black-50">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="logo w-100">
                        <a href="/home">
                            <div class="bg-light d-flex justify-content-center m-1 rounded-circle"
                                style="height: 50px; width: 50px">
                                <img class="" :src="this.w_path + '/images/logo.png'" alt="" />
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="guest" v-if="this.$attrs.auth_status == false">
                <div class="socialMedia text-right">
                    <a href="#" class="fs-4 m-2 text-decoration-none text-white">Contact :<span
                            class="text-white-50">+200114144</span></a>
                    <a href="" class="m-1"><img
                            src="https://csfabienmenot.org/wp-content/uploads/2022/02/facebook-logo-3-1.png" alt=""
                            style="width: 3%" /></a>
                    <a href="" class="m-1"><img
                            src="https://csfabienmenot.org/wp-content/uploads/2022/02/facebook-logo-3-1.png" alt=""
                            style="width: 3%" /></a>
                    <a href="" class="m-1"><img
                            src="https://csfabienmenot.org/wp-content/uploads/2022/02/facebook-logo-3-1.png" alt=""
                            style="width: 3%" /></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    inject: ["w_path"],
    mounted() {
        window.addEventListener("scroll", this.wheneScroll);
        window.addEventListener("mousemove", this.wheneMouve);
    },
    unmounted() {
        window.removeEventListener("scroll", this.wheneScroll);
        window.removeEventListener("mousemove", this.wheneMouve);
    },
    data() {
        return {
            name: "test",
            Request_response: "",
            text_search: "",
            recipes_found: "",
            showWishList:false,
        };
    },
    methods: {
        search() {
            if (this.text_search.length !== 0) {
                axios({
                    method: "post",
                    url: "/recipes/search/" + this.text_search,
                })
                    .then((response) => {
                        if (response.data) {
                            this.recipes_found = response.data;
                        }
                    })
                    .catch((error) => { });
            }
            else {
                this.recipes_found = "";
            }
        },
        toggleMenu() {
            $("#" + event.target.getAttribute("data-link")).fadeToggle("slow");
        },

        wheneScroll() {
            if ($(window).scrollTop() > 300) {
                $("#nav-dashboard").css({
                    position: "fixed",
                    top: 0,
                });
            } else {
                $("#nav-dashboard").css({
                    position: "relative",
                });
            }
        },
        wheneMouve() {
            // $('body').click(function () {
            //     $('.search-found').fadeOut();
            // });
        },
    },
};
</script>
<style scoped>
#nav-dashboard {
    height: 90px;
}

.auth input[type="search"] {
    width: 30%;
}

.top-area .form .btn-primary {
    width: 100%;
}

input[type="search"] {
    width: 50%;
}

#quick-menu {
    width: 400px;
    z-index: 9999;
    display: none;
}

#quick-menu li:hover {
    background: hsl(0, 0%, 98%);
}

@media only screen and (max-width: 780px) {
    .top-area .form .btn-primary {
        width: 100%;
    }

    .top-area .form,
    input[type="search"] {
        width: auto;
    }

    .socialMedia {
        display: none;
    }
}
</style>
