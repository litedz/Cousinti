<template>
    <div class="dashboard w-100 d-flex position-fixed h-100" dir="">
        <div class="left-bar d-flex flex-column border-end">
            <div class="logo w-100 text-center border-bottom">
                <img :src="this.w_path + '/images/logo2.png'" class="w-50 mx-auto" alt="" />
            </div>
            <div class="sidebar list-unstyled">
                <div class="head-link border-bottom text-center" @click="toggleMenu()" id="home">
                    <li class="p-2">
                        <a href="/home" class="text-capitalize text-decoration-none font-weight-bold text-white"
                            data-link="home"><span class="fa fa-home m-1 fa-2xs text-first"></span>home</a>
                    </li>
                </div>
                <div class="head-link border-bottom text-center" @click="toggleMenu()" id="reccete">
                    <li class="p-2">
                        <a href="#" class="text-capitalize text-decoration-none font-weight-bold text-white"
                            data-link="reccete"><span
                                class="fa fa-magnifying-glass m-1 fa-2xs text-first m-2"></span>recipes</a>
                    </li>
                    <div class="sub-menu">
                        <li class="border-bottom p-2 text-black-50 link-item pointer"
                            @click="changeCompo('add-recipe', 'add-recipe')">
                            <span class="fa fa-home m-1 fa-2xs text-first"></span>Add Recipe
                        </li>
                        <li class="border-bottom p-2 text-black-50 link-item pointer" @click="
                            changeCompo('table-recipes', 'update-recipe')
                        ">
                            <span class="fa fa-home m-1 fa-2xs text-first"></span>Your recipe
                        </li>
                        <li class="border-bottom p-2 text-black-50 link-item pointer">
                            <span class="fa fa-home m-1 fa-2xs text-first"></span>Add Product
                        </li>
                    </div>
                </div>

            </div>
            <div class="profile p-3 d-flex position-relative">
                <div class="avatar">
                    <a :href="w_path+'/profile/'+info.id" v-if="info.Id_user_media == null" ><img class="rounded-circle"
                            :src="w_path + '/storage/' + info.avatar" alt="" style="width: 70px; height: 70px" />
                    </a>
                    <a :href="w_path+'/profile/'+info.id" v-else >
                    <img class="rounded-circle" :src="info.avatar" alt="" style="width: 70px; height: 70px" />
                </a>

                </div>
                <div class="d-flex flex-column info m-1 p-2 w-75 justify-content-around h-100">
                    <div class="actions">
                        <i class="fa fa-circle fa-2xs" style="color: #1cd71c" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="font-1 font-weight-bold text-decoration-none text-truncate text-white w-75">{{
                        info.username }}</a>
                    <div class="DropDowmenu">
                        <a href="#" class="text-white text-decoration-none dopDownMenu-link fa fa-align-center"
                            data-link="menu-profile" @click="DropDowmenu()"></a>
                        <div class="bottom-100 menu-profile p-2 position-absolute rounded w-100" id="menu-profile">
                            <li class="border-bottom p-2 pointer">
                                <div class="profile-link d-flex flex-row justify-content-start align-items-center"
                                    @click="changeCompo('edit-profile')">
                                    <span class="fa fa-home m-1 fa-2xs text-first"></span>
                                    <span class="">Edit profile</span>
                                </div>
                            </li>
                            <li class="border-bottom p-2 pointer">
                                <div class="profile-link d-flex flex-row justify-content-start align-items-center"
                                    @click="logout()">
                                    <span class="fa fa-door-open m-1 fa-2xs text-first"></span>
                                    <a href="/logout"
                                        class="text-black-title text-capitalize text-decoration-none">Logout</a>
                                </div>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-bar w-100 overflow-auto">
            <div class="content p-3">
                <KeepAlive>
                    <component :is="this.activeComponent" v-on:some-event="get_id_recipe($event)"
                        :update_recipe_id="this.recipe_update_id" :action="this.action_recipe" :auth_id="info.id" />
                </KeepAlive>
            </div>
        </div>
    </div>
    <!-- // components : add-recipe,table-recipes -->
</template>

<script>
export default {
    inject: ["w_path"],
    props: { info: Array },
    data() {
        return {
            activeComponent: "",
            action_recipe: "",
            recipe_update_id: "", // id of recipe for update
        };
    },
    methods: {
        get_id_recipe(id) {
            this.recipe_update_id = id;
            this.activeComponent = "update-recipe";
            this.action_recipe = "update-recipe";
        },
        changeCompo(nameCompo, action) {
            this.activeComponent = nameCompo;
            this.action_recipe = action;
        },
        toggleMenu() {
            $("#" + event.target.getAttribute("data-link"))
                .find(".sub-menu")
                .slideToggle();
        },

        DropDowmenu() {
            if (
                $("#" + event.target.getAttribute("data-link")).hasClass(
                    "show-menu"
                )
            ) {
                $("#" + event.target.getAttribute("data-link")).css(
                    "left",
                    "-100%"
                );
                $("#" + event.target.getAttribute("data-link")).removeClass(
                    "show-menu"
                );
            } else {
                $("#" + event.target.getAttribute("data-link"))
                    .css("left", "0")
                    .addClass("show-menu");
            }
        },

        logout() {
            axios({ method: "get", url: "/logout" })
                .then((response) => {
                    if (response.data) {
                        if (response.data == "logout") {
                            window.location.href = "/login";
                        }
                    }
                })
                .catch((error) => { });
        },
    },
};
</script>
<style scoped>
a {
    text-decoration: none;
}

ul,
li {
    list-style: none;
}

.left-bar {
    background: linear-gradient(176deg, rgb(67 173 143), #168272);
    width: 20%;
}

.left-bar .sidebar {
    margin-bottom: auto;
    z-index: 5;
}

.left-bar div.sub-menu {
    display: none;
}

.left-bar .profile {
    height: 10%;
    background: linear-gradient(179deg, #20a994, #ffffff00);
    z-index: 10;
}

.left-bar .profile .DropDowmenu div.menu-profile {
    /* display: none; */
    background: #eeeeee;
    left: -100%;
    transition: all 0.5s;
}

.link-item {
    background: #eeeeee;
    color: hsl(0deg 0% 0% / 50%);
    border-top: 1px solid #dee2e6;
    font-weight: 500;
}

.link-item:hover {
    color: white;
    background: hsl(171deg 72% 38%);
    border-top: 0;
    transition: all 0.5s;
}

.right-bar {
    width: 100%;
    /* height: 5000px; */
}

.right-bar .content {
    width: 100%;
    height: auto;
}</style>
