
<template>
    <div class="loading-page">
        <div>
            <h1 class="">Loading ...</h1>
            <div class="mt-5">
                <div class="spinner-grow text-info"
                     role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info"
                     role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info"
                     role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info"
                     role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info"
                     role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info"
                     role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info"
                     role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script>
export default {

}

$(document).ready(function () {

    $(window).on("load", function () {
        $('.loading-page').fadeOut('slow');
    });

});

</script>
  
<style>
.loading-page {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    z-index: 9999;
    background: rgb(255, 255, 255);
}

.loading-page div:first-of-type {
    position: relative;
    margin: auto;
    top: 40%;
    text-align: center;
}
</style>