<template>
    <div class="flex-center img-container position-relative w-100">
        <img :src="w_path + '/storage/recipes/' + image" class="w-100" style="height: 450px;">
        <div class="info position-absolute text-white z-8888">
            <div class="fs-2 title">
                <a :href="w_path + '/' + urlFile" class="text-white">{{ this.title }}</a>
            </div>
            <div class="flex-center gap-3 level_time">
                <div class="flex-center gap-2 level"><span>{{ this.level }}</span>
                    <span class="fa fa-remove"></span>
                </div>
                <div class="flex-center gap-2 time"><span>{{ this.time }}</span>
                    <span class="fa fa-clock"></span>
                </div>
            </div>
        </div>
        <div class="bg-first-color h-100 overlay-img-container position-absolute top-0 w-100 z-7777"></div>
    </div>
</template>
<script>
export default {
    inject: ['w_path'],
    props: ['title', 'time', 'level', 'image', 'urlFile'],
    data() {

    },
    methods: {

    },
}
</script>
<style scoped>
.img-container .overlay-img-container,
.img-container .info {
    opacity: 0;
}

.img-container:hover .overlay-img-container {
    opacity: 0.75 !important;
    transition: all 1s;
}

.img-container:hover .info {
    opacity: 0.75 !important;
    transition: all 1s;
}
</style>