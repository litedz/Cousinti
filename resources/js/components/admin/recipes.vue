<template>
    <div class="recipes-list">
        <status ref="status"></status>
        <h1 class="border-bottom">Recipes Table</h1>
        <div class="bg-white d-grid">
            <div class="filter mb-1 rounded-1 text-white" style="background: slategray;">
                <div class="w-100">
                    <div class="row">
                        <div class="col border-end">
                            <div class="p-2">
                                <Button type="button" class="btn btn-info mb-1" @click="ClearFilter()">Clear
                                    Filter</Button>
                                <div class="fs-4 text-black-50 title">Filter By Status</div>
                                <div class="d-flex flex-column">
                                    <div class="border-bottom d-flex gap-1 justify-content-between w-50">
                                        <label class="form-check-label" for="flexRadioDefault1"> Approuved </label>
                                        <input @click="SortedByKey('status','Approuved')" class="form-check-input"
                                            type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    </div>
                                    <div class="d-flex gap-1 justify-content-between w-50">
                                        <label class="form-check-label" for="flexRadioDefault2"> Deny </label>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            @click="SortedByKey('status','Deny')" id="flexRadioDefault2">
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
                                    <div class="border-bottom d-flex gap-1 justify-content-between w-75">
                                        <label class="form-check-label" for="flexRadioDefault3"> News Recipes </label>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                            @click="SortedByKey('created_at','new')" id="flexRadioDefault3">
                                    </div>
                                    <div class="d-flex gap-1 justify-content-between w-75">
                                        <label class="form-check-label" for="flexRadioDefault4"> Old Recipes </label>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                            @click="SortedByKey('created_at','old')" id="flexRadioDefault4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="p-2">
                                <div class="fs-4 text-black-50 title">Filter By Level</div>
                                <div class="d-flex flex-column">
                                    <div class="d-flex gap-2">

                                        <label class="form-check-label">Level </label>
                                        <input class="form-check-input" type="radio" name="level"
                                            @click="SortedByKey('level')" :checked="searchKey == 'level'" id="level">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="p-2">
                                <div class="fs-4 text-black-50 title">Filter By Author</div>
                                <div class="d-flex flex-column">
                                    <div class="d-flex gap-2">

                                        <label class="form-check-label">Author </label>
                                        <input class="form-check-input" type="radio" name="author" id="RadioForAuhor"
                                            @click="SortedByKey('author')" :checked="searchKey == 'author'">
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
                            <th scope="col" class="text-capitalize">name</th>
                            <th scope="col" class="text-capitalize">type</th>
                            <th scope="col" class="text-capitalize">Url</th>
                            <th scope="col" class="text-capitalize">Rating</th>
                            <th scope="col" class="text-capitalize">Author</th>
                            <th scope="col" class="text-capitalize">like</th>
                            <th scope="col" class="text-capitalize">dislike</th>
                            <th scope="col" class="text-capitalize">created_at</th>
                            <th scope="col" class="text-capitalize">time</th>
                            <th scope="col" class="text-capitalize">level</th>
                            <th scope="col" class="text-capitalize">Status</th>
                            <th scope="col" class="text-capitalize">Actions</th>
                        </tr>
                    </thead>
                    <!-- User Table  -->
                    <tbody>
                        <tr v-for="(recipe,index) in recipesFilter" :key="recipe.info">
                            <th scope="row">{{ index + 1 }}</th>
                            <td class="fs-5">{{ recipe.name }}</td>
                            <td class="fs-5">{{ recipe.type_recipe.type }}</td>
                            <td class="fs-5">{{ recipe.url_video }}</td>
                            <td class="fs-5">{{ recipe.rating }}</td>
                            <td class="fs-5">{{ recipe.author.username }}</td>
                            <td class="fs-5">{{ recipe.like }}</td>
                            <td class="fs-5">{{ recipe.dislike }}</td>
                            <td>{{ formateDate(recipe.created_at) }}</td>
                            <td class="fs-5">{{ recipe.time }}</td>
                            <td class="fs-5">{{ recipe.level }}</td>
                            <td class="fs-5">
                                <span class="badge bg-success" v-if="recipe.is_approved">Approved</span>
                                <span class="badge bg-danger" v-else>Waiting</span>
                            </td>
                            <td class="">
                                <span class="fa-solid fa-pen-to-square mx-2 text-orange pointer"
                                    @click="FormEditStatus(recipe)"></span>
                                <span class="fa fa-trash mx-2  text-danger pointer" @click="deleteRecipe(recipe.id)"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="bg-gray h-50 left-45 mx-auto p-3 position-fixed rounded-4 top-25 w-25" id="form-role"
                    v-if="Show_form_status">
                    <span class="bg-body fa fa-remove p-1 pointer px-2 rounded-circle"
                        @click="Show_form_status = false"></span>
                    <form class="d-grid gap-2">
                        <div class="title w-100 text-center text-muted fs-5 border-bottom text-capitalize">Change Status for
                            Recipes</div>
                        <label for="username text-first fs-4">{{ RecipeEdit.name }}</label>
                        <div class="d-flex gap-2">
                            <span>Author :</span>
                            <span class="fw-bolder"> {{ RecipeEdit.author.username }}</span>
                        </div>
                        <div class="d-flex gap-2">
                            <span>Status :</span>
                            <span class="fw-bolder" v-if="RecipeEdit.is_approved"> Approved</span>
                            <span class="fw-bolder" v-else> Deny</span>
                        </div>
                        <!-- <label for="role"></label> -->
                        <select v-model="statusRecipe" class="form-select">
                            <Option value="1" key="">Approved</Option>
                            <Option value="0" key="">Deny</Option>
                        </select>

                        <button class="btn btn-primary btn-lg " type="button" @click="changePermisison(RecipeEdit.id)">
                            Change status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        this.getTableRecipes();
    },
    data() {
        return {
            recipes: '',
            recipesFilter: '',
            RecipeEdit: '',
            Show_form_status: false,
            statusRecipe: false,
            searchKey: '',
            searchValue: '',
            start_date: '',
            end_date: '',
        }
    },
    watch: {
        searchValue: {
            handler() {
                this.searchKey = '';
                if (this.searchValue.length == 0) {

                    this.recipesFilter = Object.values(this.recipes).filter(recipe => true);
                }


            },
        }
    },
    methods: {
        FormEditStatus(recipe) {
            this.Show_form_status = true;
            this.RecipeEdit = recipe;

        },
        getTableRecipes(user_id) {
            axios({ method: "get", url: "/panel/recipes" })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            console.log(response.data);
                            this.recipes = response.data.recipes;
                            this.recipesFilter = response.data.recipes;
                        }
                    }
                })
                .catch((error) => { });
        },
        changePermisison(recipe_id) {
            let data = new FormData();
            data.append('recipe_id', recipe_id);
            data.append('status', this.statusRecipe);
            axios({ method: "post", url: "/panel/recipes/" + recipe_id + "/status", data: data })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                            this.Show_form_status = false;
                            this.getTableRecipes();
                        }
                    }
                })
                .catch((error) => { });
        },
        deleteRecipe(recipe_id) {
            let data = new FormData();
            data.append('recipe_id', recipe_id);
            data.append('_method', 'DELETE');
            axios({ method: "post", url: "/panel/recipes/delete", data: data })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                            this.getTableRecipes();
                        }
                    }
                })
                .catch((error) => { });

        },
        SortedByValue() {
            this.searchKey = '';
            this.recipesFilter = Object.values(this.recipes).filter(recipe => recipe.name.match(this.searchValue));
        },
        SortedByKey(key, value) {
            this.searchKey = key;
            this.searchValue = '';
            if (key === 'status') {
                if (value == 'Approuved') {
                    this.recipesFilter = Object.values(this.recipes).filter(user => user.is_approved == true);
                } else {
                    this.recipesFilter = Object.values(this.recipes).filter(user => user.is_approved == false);
                }
            }
            else if (key === 'date') {
                this.recipesFilter = Object.values(this.recipes).filter(user => user.created_at > this.start_date && user.created_at < this.end_date);
            }

            else if (key === 'author') {
                this.recipesFilter = Object.values(this.recipes).sort((a, b) => a[this.searchKey].username < b[this.searchKey].username ? -1 : 1);
            }

            else {

                if (value == 'old') {
                    this.recipesFilter = Object.values(this.recipes).sort((a, b) => a[this.searchKey] < b[this.searchKey] ? -1 : 1).reverse();
                }
                else {
                    this.recipesFilter = Object.values(this.recipes).sort((a, b) => a[this.searchKey] < b[this.searchKey] ? -1 : 1);
                }

            }




        },
        ClearFilter() {
            this.recipesFilter = Object.values(this.recipes).filter(recipe => true);
            this.searchKey = '';
            this.searchValue = '';
        },
    }
}
</script>
<style></style>