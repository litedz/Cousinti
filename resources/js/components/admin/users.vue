<template>
    <div id="users-list">
        <status ref="status"></status>
        <h1 class="border-bottom">Users Table</h1>
        <div class="bg-white d-grid">
            <div class="filter mb-1 rounded-1 text-white" style="background: slategray;">
                <div class="w-100">
                    <div class="row">
                        <div class="col border-end">
                            <div class="p-2">
                                <Button type="button" class="btn btn-info mb-1"
                                    @click="ClearFilter()">Clear
                                    Filter</Button>
                                <div class="fs-4 text-black-50 title">Filter By Status</div>
                                <div class="d-flex flex-column">
                                    <div class="border-bottom d-flex gap-1 justify-content-between w-50">
                                        <label class="form-check-label" for="flexRadioDefault1"> verified </label>
                                        <input @click="SortedByKey('email_verified_at','verified')" class="form-check-input"
                                            type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                                            :checked="searchKey == 'email_verified_at'">
                                    </div>
                                    <div class="d-flex gap-1 justify-content-between w-50">
                                        <label class="form-check-label" for="flexRadioDefault2"> unverified </label>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            @click="SortedByKey('email_verified_at','unverified')" id="flexRadioDefault2"
                                            :checked="searchKey == 'email_verified_at'">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="p-2">
                                <div class="fs-4 text-black-50 title">Filter By Username</div>
                                <label for="name"></label>
                                <input type="text" class="form-control" name="username" placeholder="username ..."
                                    v-model="searchValue" @keypress="SortedByValue()">
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="p-2">
                                <div class="fs-4 text-black-50 title">Filter Date</div>
                                <label for="Date"></label>
                                <input type="date" class="form-control" name="name" placeholder="name ..."
                                    v-model="start_date">
                                <div> To</div>
                                <input type="date" class="form-control" name="name" placeholder="name ..."
                                    v-model="end_date">

                                <button class="btn btn-primary mt-3" @click="SortedByKey('date')"
                                    :disabled="start_date.length == 0 || end_date.length == 0">Between Dates</button>
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="p-2">
                                <div class="fs-4 text-black-50 title">Filter By Sing Up</div>
                                <div class="d-flex flex-column">
                                    <div class="border-bottom d-flex gap-1 justify-content-between w-50">
                                        <label class="form-check-label" for="flexRadioDefault3"> News Users </label>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                            @click="SortedByKey('created_at','new')" id="flexRadioDefault3">
                                    </div>
                                    <div class="d-flex gap-1 justify-content-between w-50">
                                        <label class="form-check-label" for="flexRadioDefault4"> Old Users </label>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                            @click="SortedByKey('created_at','old')" id="flexRadioDefault4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="p-2">
                                <div class="fs-4 text-black-50 title">Filter By Age</div>
                                <div class="d-flex flex-column">
                                    <div class="d-flex gap-1 justify-content-between w-25">

                                        <label class="form-check-label">Age </label>
                                        <input class="form-check-input" type="radio" name="age" @click="SortedByKey('age')"
                                            :checked="searchKey == 'age'" id="age">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow">
                <table class="table table-hover text-center">
                    <thead class="bg-gray-700 fw-lighter text-white">
                        <tr>
                            <th scope="col" class="text-capitalize">#</th>
                            <th scope="col" class="text-capitalize">username</th>
                            <th scope="col" class="text-capitalize">First</th>
                            <th scope="col" class="text-capitalize">Last</th>
                            <th scope="col" class="text-capitalize">email</th>
                            <th scope="col" class="text-capitalize">age</th>
                            <th scope="col" class="text-capitalize">phone</th>
                            <th scope="col" class="text-capitalize">Email Veréfication</th>
                            <th scope="col" class="text-capitalize">Status</th>
                            <th scope="col" class="text-capitalize">Date Sing Up</th>
                            <th scope="col" class="text-capitalize">Actions</th>
                        </tr>
                    </thead>
                    <!-- User Table  -->
                    <tbody>
                        <tr v-for="(user,index) in usersFilter" :key="user.info">
                            <th scope="row">{{ index + 1 }}</th>
                            <td class="fs-6 text-capitalize">{{ user.username }}</td>
                            <td class="fs-6 text-capitalize">{{ user.first_name }}</td>
                            <td class="fs-6 text-capitalize">{{ user.last_name }}</td>
                            <td class="fs-6">{{ user.email }}</td>
                            <td class="fs-6">{{ user.age }}</td>
                            <td class="fs-6">{{ user.phone }}</td>
                            <td class="fs-6">
                                <span class="badge bg-success" v-if="user.email_verified_at !== null">verified</span>
                                <span class="badge bg-danger" v-else>Unverified</span>
                            </td>
                            <td>
                                <span class="badge bg-orange" v-if="user.role.role == 'admin'">{{ user.role.role }}</span>
                                <span class="badge bg-info" v-if="user.role.role == 'moderator'">{{ user.role.role }}</span>
                                <span class="badge bg-gray-700" v-if="user.role.role == 'user'">{{ user.role.role }}</span>
                            </td>
                            <td>{{ formateDate(user.created_at) }}</td>
                            <td class="">
                                <span class="fa fa-user-plus mx-2 text-orange pointer" @click="FormEditRole(user)"></span>
                                <span class="fa fa-trash mx-2  text-danger pointer" @click="deleteUser(user.id)"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Form  Assing Role for User -->
        <div class="bg-gray h-50 left-45 mx-auto p-3 position-fixed rounded-4 top-50 w-25" id="form-role"
            v-if="Show_form_roles">
            <span class="bg-body fa fa-remove p-1 pointer px-2 rounded-circle" @click="Show_form_roles = false"></span>
            <form class="d-grid gap-2">
                <div class="title w-100 text-center text-muted fs-5 border-bottom">Assigne Role for User</div>
                <label for="username">{{ UserEdit.username }}</label>
                <div class="d-flex gap-2">
                    <span>Current Role :</span>
                    <span class="fw-bolder"> {{ UserEdit.role.role }}</span>
                </div>
                <label for="role"></label>
                <select v-model="SelectRole" class="form-select">
                    <option :value="role" v-for="(role,index) in Roles" :key="role">
                        {{ role }}
                    </option>
                </select>

                <button class="btn btn-primary btn-lg " type="button" @click="AssingRoleUser(UserEdit.id)">Assigne
                    Role</button>
            </form>
        </div>

    </div>
</template>
<script>
export default {

    mounted() {
        this.getTableUsers();
        this.getAvailableRoles();
    },
    data() {
        return {
            Show_form_roles: false,
            users: '',
            usersFilter: '',
            searchValue: '',
            searchKey: '',
            start_date: '',
            end_date: '',
            SelectRole: '',
            UserIdSelected: '',
            Roles: '',
            UserEdit: '',
        }
    },
    watch: {
        searchValue: {
            handler() {
                this.searchKey = '';
                if (this.searchValue.length == 0) {

                    this.usersFilter = Object.values(this.users).filter(user => true);
                }


            },
        }
    },
    methods: {
        FiltredBy(key) {
        },
        FormEditRole(user) {
            this.Show_form_roles = true;
            this.UserEdit = user;
        },
        getAvailableRoles() {
            axios({ method: "get", url: "/panel/roles" })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            this.Roles = response.data.roles;
                        }
                    }
                })
                .catch((error) => { });
        },
        getTableUsers(user_id) {
            axios({ method: "get", url: "/panel/users" })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            console.log(response.data);
                            this.users = response.data.users;
                            this.usersFilter = response.data.users;
                        }
                    }
                })
                .catch((error) => { });
        },
        deleteUser(user_id) {
            let data = new FormData();
            data.append('user_id', user_id)
            data.append('_method', 'DELETE')
            axios({ method: "POST", url: "/panel/users/" + user_id, data: data })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                            this.getTableUsers();
                        }
                    }
                })
                .catch((error) => { });
        },
        AssingRoleUser(user_id) {
            let data = new FormData();
            data.append('user_id', user_id)
            data.append('role', this.SelectRole)
            axios({ method: "POST", url: "/panel/role/change", data: data })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                            this.getTableUsers();
                            this.Show_form_roles = false;
                        }
                    }
                })
                .catch((error) => { });
        },
        ApproveUser() {
            axios({ method: "get", url: "/logout" })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {

                        }
                    }
                })
                .catch((error) => { });
        },

        SortedByKey(key, direction) {
            this.searchKey = key;
            this.searchValue = '';
            if (key === 'email_verified_at') {

                if (direction === 'unverified') {
                    this.usersFilter = Object.values(this.users).filter(user => user.email_verified_at == null);
                } else {
                    this.usersFilter = Object.values(this.users).filter(user => user.email_verified_at !== null);
                }
            }


            else if (key === 'date') {
                this.usersFilter = Object.values(this.users).filter(user => user.created_at > this.start_date && user.created_at < this.end_date);
            }

            else {

                if (direction == 'old') {
                    this.usersFilter = Object.values(this.users).sort((a, b) => a[this.searchKey] < b[this.searchKey] ? -1 : 1)
                }
                else {
                    this.usersFilter = Object.values(this.users).sort((a, b) => a[this.searchKey] < b[this.searchKey] ? -1 : 1).reverse();;
                }

            }




        },
        SortedByValue() {
            this.searchKey = '';
            this.usersFilter = Object.values(this.users).filter(user => user.username.match(this.searchValue));
        },
        ClearFilter() {
            this.usersFilter = Object.values(this.users).filter(user => true);
            this.searchKey = '';
            this.searchValue = '';
        },

        

    },

}
</script>
<style></style>