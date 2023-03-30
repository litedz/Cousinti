<template>
	<div class="bg-first-color pb-1 pt-1 top-bar z-8888" v-if="this.$attrs.show.length !== 1">
		<div class="container">
			<div class="align-items-center d-flex justify-content-between">
				<div class="contact d-flex fs-4 gap-1 h-100">
					<i class="fa fa-apple-whole fs-5 rounded-circle" style="color: #e5e7eb;"></i>
					<i class="fa fa-apple-whole fs-5 rounded-circle" style="color: #e5e7eb;"></i>
					<i class="fa fa-apple-whole fs-5 rounded-circle" style="color: #e5e7eb; "></i>
					<i class="fa fa-apple-whole fs-5 rounded-circle" style="color: #e5e7eb;"></i>
				</div>
				<div class="search">
					<div class="align-items-center d-flex gap-2 search-form">
						<li class="fa fa-search" style="color: hsl(60deg 0% 100%);"></li>
						<input type="text" id="search" class="border-0 form-control form-control-sm" style="border: none;"
							placeholder="البحث عن وصفة">
					</div>
				</div>

				<div class="align-items-center d-flex fw-bolder gap-2 login rounded" bis_skin_checked="1"
					style="/* background: rgb(65, 60, 88); */">
					<a href="/login" class="btn p-2 px-4 rounded text-decoration-none text-white"
						style="background: rgb(65, 60, 88);">Login</a>
					<a href="/register" class="btn p-2 px-4 rounded text-decoration-none text-white"
						style="background: hsl(251 19% 43% / 1);">Register</a>
				</div>
			</div>
		</div>
	</div>

	<div class="logo text-center">
		<img :src="w_path + '/images/logo.png'" alt="" style="">
	</div>
</template>

<script>
export default {
	inject: ['w_path'],
}
</script>
<style>
.logo img {
	width: 20%;
}

@media only screen and (max-width: 767px ) {
	.logo img {
		display: none;
	}
}
</style>