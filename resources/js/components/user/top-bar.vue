<template>
	<div class="bg-first-color pb-1 pt-1 top-bar z-8888" v-if="this.$attrs.show.length !== 1">
		<div class="container">
			<div class="align-items-center d-flex justify-content-between">
				<div class="contact fs-4 gap-1 h-100">
					<a class="text-decoration-none flex-center gap-2">
						<div class="fs-6 text-white"><span class="fw-bold"> Contact :</span> <span class="pointer">+1207445810</span></div>
						<div class="fs-6 text-white"><span class="fw-bold">Email :</span> <span class="pointer">Support@cousinti.com</span></div>
					</a>
				</div>
				<div class="search w-50">
					<!-- <div class="align-items-center d-flex gap-2 search-form">
						<li class="fa fa-search" style="color: hsl(60deg 0% 100%);"></li>
						<input type="text" id="search" class="border-0 form-control form-control-sm" style="border: none;"
							placeholder="البحث عن وصفة">
					</div> -->
					<search></search>
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

.contact {
	display: flex;
}

@media only screen and (max-width: 767px) {
	.logo img {
		display: none;
	}

	.contact {
		display: none !important;
	}
}
</style>