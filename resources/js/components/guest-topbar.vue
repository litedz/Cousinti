<template>
    <div class="align-items-center h-auto bg-dark d-flex form justify-content-end pb-1 pt-1 w-100 font-amiri container-fluid search-bar">
        <search></search>
        <a href="/login"
           class="btn btn-primary m-1">دخول </a>
        <a href="/register"
           class="btn btn-primary m-1">تسجيل</a>
    </div>
</template>

<script>
export default {
    mounted() {
        window.addEventListener("scroll", this.wheneScroll);
    },
    unmounted() {
        window.removeEventListener("scroll", this.wheneScroll);
    },
    data() {
        return {
            text_search: "",
            recipes_found: '',
        }
    },
    methods: {
        wheneScroll() {
            if ($(window).scrollTop() > 300) {
                $(".search-bar").css({
                    position: "fixed",
                    top: "0",
                });
            } else {
                $(".search-bar").css({
                    position: "relative",
                });
            }
        },
        search(key) {
            if (this.text_search.length !== 0) {
                axios({
                    method: "post",
                    url: "/guest/search/" + this.text_search,
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
    },
};
</script>

<style scoped>
.search-bar {
    z-index: 9999;
    height: 90px;
    position: relative;
}

.search {
    display: none;
}

.btn-primary {
    width: 6%;
    font-size: 14px;
    font-family: "amiri";
    font-weight: bolder;
}
</style>
