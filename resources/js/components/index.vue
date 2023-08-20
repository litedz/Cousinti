<template>
	<div class="wrapper d-grid gap-5 " dir="rtl">
		<status ref="status"></status>
		<section class="header d-grid gap-5 h-100  mw-100 ">
			<div class="nav-bar-home">
			</div>
			<div class="Top-recipes w-100" dir="rtl" style="height: 500px;" id="Top-recipes">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-md-4 p-0" v-for="recipe in  BestRecipes" :key="recipe.best">
							<div class="position-relative recipe h-100 w-100">
								<div class="align-items-center d-flex flex-column fs-2 h-100 justify-content-end overlay pb-4 position-absolute text-white w-100"
									style="background:linear-gradient(1deg, black,transparent, transparent);">
									<div class="name-recipe">
										<a :href="'/recipes/' + recipe.id"  aria-label="read More" class="text-decoration-none text-white">{{
											recipe.name }}</a>
									</div>
									<div class="px-4 text-start w-100" style="letter-spacing:1px;" bis_skin_checked="1">
										<div bis_skin_checked="1"
											class="badge bg-danger bg-gradient fs-6 fw-bolder text-white type">
											{{ recipe.type_recipe.type }}</div>
									</div>
									<div
										class="d-flex flex-row-reverse justify-content-between justify-content-center px-4 w-100">
										<span class="date fs-6 text-white-50">{{ formateData(recipe.created_at,'LLLL')
										}}</span>
										<!-- <span class="fs-6 text-white-50">25 views</span> -->
									</div>
								</div>


								<picture v-if="recipe.images_recipe.length !== 0">
									<source :srcset="w_path + '/storage/recipes/' + recipe.images_recipe[0].name">
									<source :srcset="w_path + '/storage/recipes/' + recipe.images_recipe[0].name">
									<img fetchpriority="high" class="img-fluid"
										:src="w_path + '/storage/recipes/' + recipe.images_recipe[0].name" alt="image"
										height="1000" width="1000">
								</picture>


								<picture v-else>
									<source :srcset="w_path + '/storage/recipes/default-cover.png'">
									<source :srcset="w_path + '/storage/recipes/default-cover.png'">
									<img class="img-fluid" :src="w_path + '/storage/recipes/default-cover.png'" alt="image"
										height="1000" width="1000">
								</picture>
								<img>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<section class="Trending mt-xl-5">
			<div class="container">
				<div class="row">
					<div class="col-4 col-md-5 p-d-none-sc right-bar">
						<div class="trend">
							<div
								class="align-items-center border d-flex flex-row-reverse gap-1 header justify-content-between pe-3">
								<span class="fa fa-arrow-trend-up fs-4 h-100 p-2 third-color"></span><span
									class="fs-3 text-black-title">وصفات هذا الشهر</span>
							</div>
							<div class="border d-grid p-3 px-3" style="direction:rtl;" v-for="recipe in recipesMonthly"
								:key="recipesMonthly.recipe">
								<div class="border d-flex mt-2 p-1 recipe text-truncate">
									<picture v-if="recipe.images_recipe.length !== 0">
										<source :srcset="w_path + '/storage/recipes/' + recipe.images_recipe[0].name">
										<source :srcset="w_path + '/storage/recipes/' + recipe.images_recipe[0].name">
										<img class="img-fluid"
											:src="w_path + '/storage/recipes/' + recipe.images_recipe[0].name"
											alt="image recipe" title="image recipe" style="height:80px;">
									</picture>


									<picture v-else>
										<source :srcset="w_path + '/storage/recipes/default-cover.webp'">
										<source :srcset="w_path + '/storage/recipes/default-cover.webp'">
										<img class="img-fluid" :src="w_path + '/storage/recipes/default-cover.webp'"
											alt="image recipe" title="image recipe" style="height:80px;">
									</picture>

									<div class="d-flex flex-column gap-1 mx-2">
										<div class="name-recipe">
											<a :href="w_path + '/recipes/' + recipe.id"
											aria-label="Read more"
												class="text-black-title fs-3 text-decoration-none" data-toggle="tooltip"
												data-placement="top" :title="recipe.name">{{ recipe.name }}</a>
										</div>
										<a :href="'/similar/' + recipe.type_recipe.type"
										aria-label="go to similar type recipe"
											class="type text-decoration-none color-link">{{
												recipe.type_recipe.type }}</a>
									</div>
								</div>
							</div>
						</div>
						<div class="populer"></div>
					</div>

					<div class="col-12 col-md-7 d-grid gap-4 left-bar">
						<div class="fs-2 header position-relative text-black-title">رمضانيات</div>

						<div class="row gy-3" style="height: 500px;" id="MostCommentRecipe">
							<div v-for="(recipe,index) in MostComment" :key="recipe.MostComment">
								<!-- Print first Image  -->
								<div class="col-12" v-if="index == 0">
									<div class="recipe overflow-hidden">
										<div class="w-100">
											<div class="img-container  position-relative w-100">
												<div
													class="d-flex fw-bolder gap-4 info justify-content-center position-absolute text-center text-white third-color top-50 w-100 z-9999">
													<span class="level">
														<span class="mx-2">{{ recipe.level }}</span>
														<span class="fa fa-signal-perfect"></span></span>
													<span class="time">
														<span class="mx-2">{{ recipe.how_long }} Min</span>
														<span class="fa fa-clock-four"></span>
													</span>
												</div>
												<div
													class="align-items-center bg-first-color d-flex h-100 justify-content-center overlay p-2 position-absolute w-100">
												</div>


												<picture v-if="recipe.images_recipe.length !== 0">
													<source
														:srcset="w_path + '/storage/recipes/' + recipe.images_recipe[0].name">
													<source
														:srcset="w_path + '/storage/recipes/' + recipe.images_recipe[0].name">
													<img :src="w_path + '/storage/recipes/' + recipe.images_recipe[0].name"
														class="img-fluid " alt="image_recipe">
												</picture>

												<picture v-else-if="recipe.images_recipe.length == undefined">
													<source :srcset="w_path + '/storage/recipes/default-cover.png'">
													<source :srcset="w_path + '/storage/recipes/default-cover.png'">
													<img :src="w_path + '/storage/recipes/default-cover.png'"
														alt="image_recipe" class="img-fluid">
												</picture>

											</div>
											<div class="fs-3 title">{{ recipe.name }}</div>
											<div class="d-grid gap-1">
												<a :href="'/profile/' + recipe.author.id"
												aria-label="got to profile "
													class="author fst-italic fw-bolder color-link text-decoration-none">{{
														recipe.author.username }}</a>
												<span class="data second-color fs-6"><span class="">{{
													formateData(recipe.created_at,'LL') }}</span><span
														class="fa fa-calendar-alt"></span></span>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="col-6 col-md-6 col-lg-3" v-if="index !== 0" v-for="(recipe,index) in MostComment"
								:key="recipe.MostComment">
								<div class="d-grid position-relative recipe">
									<div class="img-container position-relative">
										<div
											class="d-flex fw-bolder gap-2 info justify-content-center position-absolute text-center text-white third-color top-50 w-100 z-9999">
											<span class="level"><span class="mx-2">Beginner</span><span
													class="fa fa-signal-perfect"></span></span><span class="time"><span
													class="mx-2">30 Min</span><span class="fa fa-clock-four"></span></span>
										</div>
										<div
											class="align-items-center bg-first-color d-flex h-100 justify-content-center overlay p-2 position-absolute w-100">
										</div>

										<picture>
											<source :srcset="w_path + '/storage/recipes/' + recipe.images_recipe[0].name">
											<source :srcset="w_path + '/storage/recipes/' + recipe.images_recipe[0].name">
											<img :src="w_path + '/storage/recipes/' + recipe.images_recipe[0].name"
												alt="image" class="img-fluid" height="1000" width="1000">
										</picture>

									</div>
									<div class="fs-3 title text-truncate">{{ recipe.name }}</div>
									<div class="d-grid gap-1"><a :href="'/profile/' + recipe.author.id"
										aria-label="got to profile"
											class="author fst-italic fw-bolder color-link text-decoration-none">{{
												recipe.author.username }}</a><span class="data second-color fs-6"><span
												class="">{{ formateData(recipe.created_at,'LL') }}</span><span
												class="fa fa-calendar-alt"></span></span></div>
								</div>




							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="categories d-grid gap-5">
			<div class="align-items-center d-flex flex-column heading justify-content-center position-relative text-center">

				<picture>
					<source :srcset="w_path + '/images/shape-v2.png'">
					<source :srcset="w_path + '/images/shape-v2.png'">
					<img :src="w_path + '/images/shape-v2.png'" class="img-fluid" style="width:120px;" alt="image" width="120" height="120">
				</picture>
				
				<span class="fs-1 mt-2 position-absolute top-50 w-100">Heading</span>
			</div>
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="categorie col-3 col-md-2 overflow-hidden p-0" v-for="cat in types_recipe" :key="cat.recipe">
						<div class="img-container position-relative">

							<picture>
								<source :srcset="w_path + '/storage/types/' + cat.image">
								<source :srcset="w_path + '/storage/types/' + cat.image">
								<img :src="w_path + '/storage/types/' + cat.image" alt="image type" class="img-fluid"
									height="500" width="500">
							</picture>

							<div class="h1 position-absolute text-center text-white title top-50 w-100 opacity-0"
								style="background: #a52a2a82;">{{ cat.type }}</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<section class="subscribee mt-5">
			<div class="p-4 position-relative z-5555">
				<div class="container">
					<div class="d-flex flex-column gap-2 justify-content-center p-4 position-relative w-100 z-9999">
						<div class="d-flex flex-column text-center">
							<span class="fs-1">Enjoy with Our Website</span>
							<span class="fs-5 text-black-50">Onclick and you are clitch</span>
						</div>
						<div class="d-flex gap-1 justify-content-center">
							<input type="text" name="" id="" placeholder="Please Subscribesubscribee Here . . ."
								class="form-control w-100-sc w-25-perso">
							<button type="button" class="bg-second-color border-0 btn btn-danger"
								name="subscribee">Subscribesubscribee</button>
						</div>
					</div>
				</div>
				<!-- <div class="bg-black h-100 opacity-25 overlay position-absolute top-0 w-100"></div> -->
			</div>
		</section>
		<section class="random-recipe mt-5">
			<div class="">
				<div class="container pb-5">
					<div class="row">
						<div class="align-self-center col-12 col-md-6 ">
							<div class="align-items-start d-flex flex-column fs-6 gap-4 lh-lg p-3 rounded">
								<div class="fs-1 title">مشكلة الفطور في اليوم</div>
								<div class="text">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص
									من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
									زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد
									النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد
									النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن
									يطلع على صورة حقيقية لتصميم الموقع. ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على
									التصميم.</div>
								<div class="d-flex gap-2 gap-3 justify-content-center">
									<button @click="activeComponent = 'random-recipe'" type="button" name="recipeOfthe Day"
										class="bg-second-color btn btn-lg fw-bolder" style="color: #2c1c1c;">وصفة
										اليوم</button>
									<button type="button" class="bg-white border btn btn-lg  fw-bolder"
										style="color: #1c292c;">اختيار
										حسب
										المقادير</button>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 d-flex justify-content-center cover">
							<picture>
								<source :srcset="w_path + '/images/cover3.webp'">
								<source :srcset="w_path + '/images/cover3.webp'">
								<img class="img-fluid" :src="w_path + '/images/cover3.webp'" alt="image random" height="1000"
									width="1000">
							</picture>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="compnent-random-recipe">
			<KeepAlive>
				<component :is="activeComponent" @CloseRecipe="activeComponent = 'empty'" />
			</KeepAlive>
		</section>
		<section class="d-grid interesting">
			<div class="border-top container d-grid gap-5 mt-1">
				<div class="d-flex flex-column fs-1 heading-separator mb-3 mt-3 position-relative text-center"><span
						class="">interesting</span>
					<picture>
						<source :srcset="w_path + '/images/seperator-interesting.png'">
						<source :srcset="w_path + '/images/seperator-interesting.png'">
						<img :src="w_path + '/images/seperator-interesting.png'" alt="image seperatore"
							class="position-absolute w-25 img-fluid" style="left:38%;top:85%;" height="1000" width="1000">
					</picture>

				</div>
				<div class="border-top pt-3 row">
					<div class="col-3 col-md-4 right-bar p-d-none-sc">
						<div class="border col-12 mb-2 social-media">
							<div class="bg-second-color fs-5 fw-bolder heading p-2 text-center text-white"><span>Follow
									Us</span></div>
							<div class="d-flex fs-4 gap-2 justify-content-center p-3 text-black-title"><i
									class="fa-brands fa-facebook"></i><i class="fa-brands fa-youtube"></i><i
									class="fa-brands fa-instagram"></i></div>
						</div>
						<div class="border col-12 top-user">
							<div class="bg-gradient bg-second-color fs-5 heading p-2 text-center text-white"><span>Most
									Posted</span></div>
							<div class="bg-light d-flex gap-2 m-1 px-2 rounded user" v-for="user in UserMostPosted"
								:key="user.posted">
								<img :src="w_path + '/storage/' + user.avatar" alt="avatar" title="avatar"
									style="width: 70px;height: 70px;" class="rounded-circle img-fluid">
								<div class="d-flex flex-column gap-1 justify-content-start">
									<a :href="w_path + '/profile/' + user.id"  aria-label="profile show" class="fs-4 name text-black-title">{{
										user.username }}
									</a><span class="first-color fs-6">{{ user.rank.rank }}</span>
								</div>
							</div>

						</div>
					</div>
					<div class="content col-12 col-md-8">
						<div class="row">
							<div class="col-12" v-for="recipe in RatingRecipe" :key="recipe.rating">
								<div class="d-flex">

									<picture>
										<source srcset="https://picsum.photos/200">
										<source srcset="https://picsum.photos/200">
										<img src="https://picsum.photos/200" alt="image" width="120" height="120"
											class="img-thumbnail img-fluid rounded">
									</picture>

									<div class="d-grid px-3">
										<div class="">
											<a class="fs-4 title text-decoration-none text-black-title"
											aria-label="Show Recipe"
												:href="w_path + '/recipes/' + recipe.id">{{ recipe.name }}</a>
											</div>
										<div class="discption text-truncate fs-6 text-black-title">{{ recipe.description }}
										</div>
										<div class="date font-italic fs-6 second-color">{{
											formateData(recipe.created_at,'LL') }}
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="footer">
			<footer-page></footer-page>
		</section>

		<button @click="backTop()" type="button" class="btn btn-info btn-floating btn-lg position-fixed rounded-pill z-7777"
			style="right: 5%; bottom: 5%; display: none" id="btn-back-to-top">
			<i class="fas fa-arrow-up"></i>
		</button>
	</div>
</template>

<script>
import moment from "moment";
export default {
	inject: ["w_path"],
	mounted() {
		window.addEventListener("scroll", this.wheneScroll);
		this.availableTypes();
		this.getRecipes();
	},
	unmounted() {
		window.removeEventListener("scroll", this.wheneScroll);
	},
	data() {
		return {
			recipesMonthly: '',
			UserMostPosted: '',
			MostComment: '',
			BestRecipes: '',
			RatingRecipe: '',
			LatestRecipes: '',
			types_recipe: "",
			effectImg: false,
			imgBestRecipe: false,
			show: "",
			activeComponent: "",
			showSubmenu: "",
			subscribe: '',
			buttonSubscrube: true,
		};
	},
	methods: {
		getRecipes() {

			axios({ method: "get", url: "/guest/recipe" })
				.then((response) => {
					if (response.data) {
						this.UserMostPosted = response.data.UserMostPosted;
						console.log('finish 1');
						this.BestRecipes = response.data.BestRecipe;
						console.log('finish 2');
						this.MostComment = response.data.MostComment;
						console.log('finish 3');
						this.recipesMonthly = response.data.recipesOfMonth;
						this.RatingRecipe = response.data.RatingRecipe;
						this.LatestRecipes = response.data.LatestRecipes;
						document.getElementById('Top-recipes').style.height = "auto";
						document.getElementById('MostCommentRecipe').style.height = "auto";;

					}


				})
				.catch((error) => {
				});
		},

		formateData(created_at, form) {
			return moment(created_at, true).format(form);
		},

		backTop() {
			document.documentElement.scrollTop = 0;
		},
		availableTypes() {
			axios({ method: "get", url: "types_recipe" })
				.then((response) => {
					if (response.data) {
						this.types_recipe = response.data;
					}
				})
				.catch((error) => { });
		},
		EffectCategorie() {
			this.effectImg = !this.effectImg;
			if (this.effectImg) {
				$("#" + event.target.id)
					.find("img")
					.css({ transform: "scale(1.1)" });
				$("#" + event.target.id)
					.find(".squar")
					.css({ height: "100%" });
			} else {
				$("#" + event.target.id)
					.find(".squar")
					.css({ height: "10%" });
				$("#" + event.target.id)
					.find("img")
					.css({ transform: "scale(1)" });
			}
		},
		EffectBestRecipe() {
			this.imgBestRecipe = !this.imgBestRecipe;
			if (this.imgBestRecipe) {
				$(event.target).find(".opc").css("opacity", "0.7");
				$(event.target).find(".icon").css("opacity", "1");
			} else {
				$(event.target).find(".opc").css("opacity", "0");
				$(event.target).find(".icon").css("opacity", "0");
			}
		},
		scrollSlider(action, name_slider) {
			var show = document.getElementById(name_slider);
			let right = parseInt(show.style.right);
			let widthSlider = show.offsetWidth;
			if (action === "right") {
				if (right < widthSlider - 300) {
					show.style.right = right + 300 + "px";
				} else {
					show.style.right = "0px";
				}
			} else {
				if (right > 0) {
					show.style.right = right - 300 + "px";
				}
			}
		},
		wheneScroll() {
			if ($(window).scrollTop() > 200) {
				$("#btn-back-to-top").fadeIn();

			} else {
				$("#btn-back-to-top").fadeOut();
			}
		},
		hoverLink(action) {
			if (action == "leave") {
				$("#" + event.target.getAttribute("data-menu")).fadeOut();
				$(".sub-menu").fadeOut();
			} else {
				$(".index-nav li a").removeClass("link-nav");
				$(event.target).addClass("link-nav");
				if ($(event.target).hasClass(".link-nav") == false) {
					$(".sub-menu").fadeOut();
				}
				$("#" + event.target.getAttribute("data-menu")).fadeIn();
			}
		},
		toggleNav() {
			$(".nav").fadeToggle();
		},

	},
};
</script>
<style scoped>
.wrapper {
	max-width: 100%;
	height: auto;
}

.random-recipes .recipe:hover .overlay {

	opacity: 1 !important;
	transition: all 1s;

}

.left-bar .header:after {
	content: '';
	background: #bdbdbd;
	width: 100%;
	height: 1px;
	position: absolute;
	top: 50%;
	margin: 0 30px;
	text-shadow: 1px 1px red;
}

.left-bar .header:before {
	content: '';
	height: 44px;
	width: 70px;
	background: #c9c9c900;
	position: absolute;
	/* top: 39%; */
	z-index: 1;
	opacity: 0.2;
	border-radius: 50%;
	right: 6%;
	z-index: 2;
	border-left: 5px solid red;
}

.Trending .img-container .overlay {
	opacity: 0;
}

.Trending .img-container .info {
	opacity: 0;
}

.Trending .img-container:hover .overlay {
	opacity: 0.8;
	transition: all 1s;
}

.Trending .img-container:hover .info {
	opacity: 1;
	transition: all 1s;
}



.categories .heading span::after {
	content: '';
	width: 45%;
	height: 1px;
	position: absolute;
	background: #c9c9c9;
	top: 50%;
	left: 0;
	margin: 0 10px;
}

.categories .heading span::before {
	content: '';
	width: 45%;
	height: 1px;
	position: absolute;
	background: #c9c9c9;
	top: 50%;
	right: 0;
	margin: 0 10px;
}

.categories .img-container img {
	transform: scale(1);
	transition: all 1s;
}

.categories .img-container:hover img {
	transform: scale(1.1);
	transition: all 1s;
}

.categories .img-container:hover .title {
	opacity: 1 !important;
	transition: all 1s;
}

section.subscribee div:first-of-type {
	background: url('~/images/cover-subscribe.webp');
	background-size: cover;
	background-attachment: fixed;
	background-position: center;
}



/* .random-recipe .carousel-indicators {
	width: 20px !important;
	height: 20px !important;
	border-radius: 50% !important;
} */
/* Slider */
.carousel-indicators button.thumbnail {
	width: 100px;
}

.carousel-indicators button.thumbnail:not(.active) {
	opacity: 0.7;
}

.carousel-indicators {
	position: static;
}

.traditional-recipes .carousel-inner {
	padding: 1em;
}

.traditional-recipes .card {
	margin: 0 0.5em;
	border-radius: 0;
	box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
	font-size: 0.9em;
}

.traditional-recipes .carousel-control-prev,
.traditional-recipes .carousel-control-next {
	width: 6vh;
	height: 6vh;
	background-color: #e1e1e1;
	border-radius: 50%;
	top: 50%;
	transform: translateY(-50%);
	opacity: 0.5;
}

.traditional-recipes .carousel-control-prev:hover,
.traditional-recipes .carousel-control-next:hover {
	opacity: 0.8;

}

@media only screen and (max-width: 767px) {
	.Trending .trend .recipe {
		flex-direction: column !important;
	}

	/* Slider */
	.traditional-recipes .carousel-inner {
		display: flex;
	}

	.traditional-recipes .carousel-item {
		display: block;
		margin-right: 0;
		flex: 0 0 calc(100% / 3);
	}

	.traditional-recipes .img-wrapper {
		height: 21vw;
	}
}

@media only screen and ((min-width: 767px) and (max-width: 920px)) {

	.Trending .recipe .name-recipe {
		width: 50%;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}
}
</style>