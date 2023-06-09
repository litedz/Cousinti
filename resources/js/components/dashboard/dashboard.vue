<template>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo"> Ready Dashboard </a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
					data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more">
					<i class="la la-ellipsis-v"></i>
				</button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control" />
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification" v-if="notifications.length !== 0">
									{{ CountNotificationNotReading() }}
								</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title" v-if="CountNotificationNotReading() > 0">
										You have
										{{ CountNotificationNotReading() }} new
										notification
									</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#" v-for="message in notifications">
											<div class="notif-icon notif-primary">
												<i class="la la-user-plus"></i>
											</div>
											<div class="notif-content">
												<span class="block">
													{{ message.subject }}
												</span>
												<span class="time">
													{{
														formateDate(
															message.created_at
														)
													}}</span>
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">
										<strong>See all notifications</strong>
										<i class="la la-angle-right"></i>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<img :src="w_path + '/storage/' + info.avatar" alt="user-img" width="36"
									class="img-circle" /><span>Hizrian</span></a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img">
											<img :src="w_path + '/storage/' + info.avatar" alt="user" />
										</div>
										<div class="u-text">
											<h4>Hizrian</h4>
											<p class="text-muted">
												hello@themekita.com
											</p>
											<a :href="'/profile/' + info.id" class="btn btn-rounded btn-danger btn-sm">View
												Profile</a>
										</div>
									</div>
								</li>
								<div class="dropdown-divider"></div>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" @click="activeComponent = 'edit-profile'"><i
										class="ti-settings"></i> Account
									Setting</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/logout"><i class="fa fa-power-off"></i> Logout</a>
							</ul>
							<!-- /.dropdown-user -->
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="sidebar">
			<div class="scrollbar-inner sidebar-wrapper">
				<div class="user">
					<div class="photo">
						<img src="https://i.pravatar.cc/300" />
					</div>
					<div class="info">
						<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
							<span>
								Hizrian
								<span class="user-level">Administrator</span>
								<span class="caret"></span>
							</span>
						</a>
						<div class="clearfix"></div>

						<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
							<ul class="nav">
								<li>
									<a :href="'/profile/' + info.id"  >
										<span class="link-collapse">My Profile</span>
									</a>
								</li>
								<li>
									<a href="#" @click="activeComponent ='edit-profile'">
										<span class="link-collapse">Edit Profile</span>
									</a>
								</li>
								<li>
									<a href="#" @click="activeComponent ='edit-profile'">
										<span class="link-collapse">Settings</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<ul class="nav">
					<li class="nav-item active" @click="activeComponent = 'statuc_user'">
						<a href="#">
							<i class="la la-dashboard"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item dropdownable">
						<a data-bs-toggle="collapse" role="button" href="#recipe-link" aria-expanded="false"
							aria-controls="collapseExample">
							<i class="fa fa-kitchen-set"></i>
							<p>Recipe</p>
							<span class="fa fa-arrow-down-short-wide text-right w-100"></span>
						</a>
						<div class="bg-gray collapse sub-menu" id="recipe-link">
							<div class="align-items-lg-baseline d-flex flex-column px-5">
					<li class="border-bottom d-flex flex-center fs-6 fw-mediumbold gap-2 p-2 sub-link text-black-title text-capitalize text-center pointer"
						@click="activeComponent = 'add-recipe'">
						<span class="text-success fa fa-plus"></span><span>Add Recipe</span>
					</li>
					<li class="border-bottom d-flex flex-center fs-6 fw-mediumbold gap-2 p-2 sub-link text-black-title text-capitalize text-center pointer"
						@click="activeComponent = 'update-recipe'">
						<span class="text-success fa fa-arrow-left-rotate"></span><span>Update Recipe</span>
					</li>
					<li class="border-bottom d-flex flex-center fs-6 fw-mediumbold gap-2 p-2 sub-link text-black-title text-capitalize text-center pointer"
						@click="activeComponent = 'table-recipes'">
						<span class="text-success fa fa-list"></span><span>List</span>
					</li>
			</div>
		</div>
		</li>
		<li class="nav-item" @click="activeComponent = 'last-activity'">
			<a href="#" class="gap-2">
				<i data-feather="activity" width="20" class="text-success"></i>
				<p class="text-capitalize">Lasts Activitys</p>
			</a>
		</li>
		<li class="nav-item" @click="activeComponent = 'wishlist-setting'">
			<a href="#">
				<i class="fa fa-heart first-color"></i>
				<p class="text-capitalize w-100">Wish List</p>
			</a>
		</li>

		<li class="nav-item" @click="activeComponent = 'user-messages'">
			<a href="#">
				<i class="fa fa-envelope text-info"></i>
				<p class="text-capitalize w-100">Messages</p>
			</a>
		</li>

		<li class="nav-item" @click="activeComponent = 'contact-us'">
			<a href="#">
				<i class="fa fa-bell text-warning"></i>
				<p class="text-capitalize w-100">Notifications</p>
			</a>
		</li>
		<li class="nav-item" @click="activeComponent = 'contact-us'">
			<a href="#">
				<i class="fa fa-circle-info text-muted"></i>
				<p class="text-capitalize w-100">Contact Support</p>
			</a>
		</li>
		<li class="nav-item update-pro position-absolute" style="bottom: 5%;">
			<button data-toggle="modal" data-target="#modalUpdate"
				class="btn d-flex gap-1 justify-content-center mx-4 pt-3 text-white w-100" style="
    background: #4d7cfe;
"><i class="la la-hand-pointer-o"></i>
				<p>Update To Pro</p>
			</button>
		</li>
		</ul>
	</div>
	</div>
	<div class="main-panel">
		<div class="content">
			<div class="container-fluid">
				<KeepAlive>
					<component :is="this.activeComponent" v-on:update-recipe="get_id_recipe($event)"
						v-on:send-message="getMessages()" :update_recipe_id="this.recipe_update_id"
						:action="this.action_recipe" :auth_id="info.id" :auth_email="info.email"
						:user="info"
						 />
				</KeepAlive>
			</div>
		</div>
	</div>
	</div>
</template>

<script>
export default {
	inject: ["w_path"],
	props: { info: Object },

	mounted() {
		this.getMessages();
		this.getNotifications();
		setInterval(() => {
			this.getNotifications();
			this.getMessages();
			console.log(this.CountNotificationNotReading());
		}, 10000);
	},
	data() {
		return {
			activeComponent: "user-notifications",
			action_recipe: "",
			recipe_update_id: "", // id of recipe for update
			show_messages: false,
			messages: "",
			notifications: [""],
			show_notification: false,
			notifiNotRead: "",
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
			$("#sidebar").removeClass("active");
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

		getMessages() {
			let data = new FormData();
			axios({ method: "get", url: "/messages/" + this.info.id })
				.then((response) => {
					if (response.data) {
						this.messages = response.data;
					}
				})
				.catch((error) => { });
		},
		getNotifications() {
			axios
				.get("/user/notifi/" + this.info.id)
				.then((response) => {
					if (response.data) {
						this.notifications = response.data;
					}
				})
				.catch((error) => { });
		},
		UpdateNotification(notification_id) {
			let data = new FormData();
			data.append("_method", "PATCH");
			data.append("notification_id", notification_id);
			axios
				.post("/user/notifi/" + notification_id, data)
				.then((response) => {
					if (response.data == "updated") {
						this.getNotifications();
					}
				});
		},
		DeleteNotification(notification_id) {
			let data = new FormData();
			data.append("_method", "DELETE");
			data.append("notification_id", notification_id);
			axios
				.post("/user/notifi/" + notification_id, data)
				.then((response) => {
					if (response.data == "Deleted") {
						this.getNotifications();
					}
				});
		},
		DeleteMessage(message_id) {
			let data = new FormData();

			data.append("message_id", message_id);
			data.append("_method", "DELETE");
			axios
				.post("messages/" + message_id, data)
				.then((response) => {
					if (response.data) {
						this.$refs.status.Display(
							response.data.style,
							response.data.message,
							response.data.status,
							response.data.icon
						);
						this.getMessages();
					}
				})
				.catch((error) => { });
		},
		logout() {
			axios
				.get("/logout")
				.then((response) => {
					if (response.data) {
						if (response.data == "logout") {
							window.location.href = "/login";
						}
					}
				})
				.catch((error) => { });
		},
		CountNotificationNotReading() {
			let counter = this.notifications.filter(
				(note) => note.status == 0
			).length;
			if (counter !== 0) {
				return counter;
			}
		},
	},
};
</script>
<style scoped>
.sidebar .sidebar-wrapper {
	top: 3% !important;
}


@media only screen and (max-width:991px) {
	.main-header {
		background-color: transparent !important;
		border-bottom:0 !important
	}

	.logo-header {
		background: white !important;
	}


}
</style>
