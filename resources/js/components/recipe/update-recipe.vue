<template>
    <status ref="status"></status>
    <div class="update-recipe bg-light mx-auto mb-5 p-3 rounded w-75" dir="rtl">
        <h3 class="text-center text-info">
            <span class="fa fa-refresh m-1 font-1"></span>تحديث الوصفة
        </h3>
        <div v-if="this.erros_recipe">
            <div class="alert alert-danger" v-for="er in this.erros_recipe" :key="er">
                <li>{{ er[0] }}</li>
            </div>
        </div>
        <FormKit type="form" :actions="false">
            <FormKit type="text" name="name" value="ma9roud" v-model="name_recipe" input-class="form-control mt-2"
                label="اسم الوصفة :" label-class="text-weight-800" help="اسم الوصفة لا يجب ان يحتوي علي ارقام"
                help-class="text-black-50" validation="required" />

            <FormKit type="text" value="oum walid" name="source" v-model="source_recipe" input-class="form-control"
                outer-class=" mt-3" label="المصدر :" label-class="text-weight-800" help="مصدر الوصفة او اسم الشيف"
                help-class="text-black-50" validation="required" />

            <label for="type" class="text-weight-800 mt-3 mb-1">اختر نوع الوصفة :</label>
            <select class="form-select" validate="required" v-model="selected_type" id="select_type">
                <option v-for="val in this.types_recipe" :value="val.id" :key="val">
                    {{ val.type }}
                </option>
            </select>

            <FormKit type="text" value="www.youtube.com" name="video" v-model="url_video" input-class="form-control"
                outer-class=" mt-3" label="مقطع الفيديو :" label-class="text-weight-800" help="" help-class="text-black-50"
                validation="" />
            <hr />
        </FormKit>
        <FormKit type="form" :actions="false">
            <div class="ingredients border-bottom" dir="rtl">
                <!-- Table ingredients  -->
                <table class="table table-bordered table-hover table-white w-50 bg-white" dir="rtl"
                    v-if="ingredients.length !== 0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">المكونات</th>
                            <th scope="col" class="text-center">الكمية</th>
                            <th scope="col" class="text-center">الحذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="table_ingredients" v-for="(key,index) in ingredients" :key="key">
                            <td class="text-center">
                                {{ key.name_ingredient }}
                            </td>
                            <td class="text-center">{{ key.quantity }}</td>

                            <td class="text-center">
                                <i class="fa fa-circle-minus font-3 text-danger pointer" @click="removeFromtable(index)"
                                    aria-hidden="true"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex w-50 align-items-center" v-if="show_inputs == 'add_ingredient_table'">
                    <FormKit type="text" id="ingredient_name" name="ingredient" input-class="form-control mt-2"
                        outer-class="ms-3 border-start p-1" label-class="text-weight-800" help="اسم المكون"
                        help-class="text-black-50" validation="required" />

                    <FormKit type="text" name="quantity" id="ingredient_quantity" input-class="form-control mt-2"
                        outer-class="ms-3 p-1" label-class="text-weight-800" help="الكمية باالغارم (g)"
                        help-class="text-black-50" @keydown.enter="add_ingredient_table" validation="required|number" />

                    <FormKit type="button" @click="add_ingredient_table()" @keyup.enter="add_ingredient_table"
                        :actions="false"
                        input-class="fa fa-2x fa-check-circle text-success pointer  border-0 bg-transparent" />
                </div>
                <div class="d-flex justify-content-start">
                    <p class="m-1 text-black-50 text-weight-500">
                        اضافة مكونات
                    </p>
                    <span>
                        <i @click="show_inputs = 'add_ingredient_table'"
                            class="border fa fa-2 fa-plus-circle font-3 rounded-circle text-bg-info text-white m-1 pointer"
                            aria-hidden="true"></i></span>
                </div>
            </div>
        </FormKit>

        <div class="images mt-4">
            <FormKit type="file" id="head_file" name="files" label="الصورة الرئيسبة :" label-class="text-weight-500"
                file-remove-class="btn btn-primary m-2" input-class="form-control mt-2" validation="file" />

            <div class="headImage position-relative" v-for="image in images" :key="image">
                <li class="m-1 bg-light fa fa-remove font-3 position-absolute px-1 rounded-circle text-danger top-0 pointer"
                    @click="removeOtherImage(image.id)"></li>
                <img class="w-25" :src="
                    this.w_path +
                    '/' +
                    'storage/recipes/' +
                    image.name
                " v-if="image.cover === 'active'" />
            </div>
            <FormKit type="file" id="files" multiple name="files" label="الصور :" label-class="text-weight-500"
                file-remove-class="btn btn-primary m-2" input-class="form-control mt-2" validation="file" />
            <div class="otherImages d-flex">
                <div v-for="image in this.update_recipe.images_recipe" :key="image" class="position-relative">
                    <div v-if="image.cover !== 'active'">
                        <li v-if="image.length !== 0"
                            class="m-1 bg-light fa fa-remove font-3 position-absolute px-1 rounded-circle text-danger top-0 pointer"
                            @click="removeOtherImage(image.id)"></li>
                        <img class="rounded" style="width: 250px; height: 150px" :src="
                            this.w_path +
                            '/' +
                            'storage/recipes/' +
                            image.name
                        " />
                    </div>
                </div>
            </div>
        </div>

        <FormKit type="form" #default="{ state: { valid } }" :actions="false">
            <div class="how_todo mt-4">
                <FormKit type="textarea" label="طريقة التحضير" label-class="font-3 mb-2 text-weight-800" v-model="how_todo"
                    input-class="form-control" rows="10" validation="required|length:25"
                    placeholder="مثال: لدينا اولا مزج البيض مع الفرينة" help="يجب ان لا يقل النص 200 حرف "
                    help-class="text-black-50" />
            </div>
            <FormKit type="button" input-class="btn btn-primary mt-2" :disabled="!valid" @click="add_recipe()">تحديث
                الوصفة<span class="fa fa-plus-circle m-2 text-white"></span></FormKit>
        </FormKit>
    </div>
</template>

<script>
export default {
    inject: ["w_path"],
    mounted() {
        this.getTypesRecipes();
        this.update_recipe_id = this.$attrs.update_recipe_id;
    },
    activated() {
        this.getRecipe(this.$attrs.update_recipe_id);
        // this.erros_recipe = [];
    },
    deactivated() {
        // this.clearForm(this.$attrs.action);
    },

    data() {
        return {
            update_recipe: "",
            update_recipe_id: 0,
            name_recipe: "",
            source_recipe: "",
            url_video: "",
            selected_type: '',
            types_recipe: [],
            ingredients: [],
            images: [],
            how_todo: "",
            erros_recipe: [],
            show_inputs: "",
        };
    },
    methods: {
        getRecipe(recipe_id) {
            if (recipe_id) {
                axios({
                    method: "get",
                    url: "recipe/" + recipe_id,
                })
                    .then((response) => {
                        const recipe = response.data.recipe;
                        var form_select =
                            document.getElementById("select_type").options;
                        if (recipe) {
                            this.update_recipe = recipe;
                            this.name_recipe = recipe.name;
                            this.selected_type = recipe.type_recipe.id;

                            this.url_video = recipe.url_video == null ? '' : "https://www.youtube.com/" + recipe.url_video;

                            this.ingredients = recipe.ingredient;
                            this.how_todo = recipe.how_todo;
                            this.images = recipe.images_recipe;
                            document.getElementById('select_type');

                        }
                    })
                    .catch((error) => { });
            }
        },
        getTypesRecipes() {
            axios({ method: "get", url: "types_recipe" })
                .then((response) => {
                    if (response.data) {
                        this.types_recipe = response.data;

                    }
                })
                .catch((error) => { });
        },
        add_ingredient_table() {
            var name = document.getElementById("ingredient_name").value;
            var quantity = document.getElementById("ingredient_quantity").value;
            if (name.length != 0 && quantity.length != 0) {
                this.ingredients.push({
                    name_ingredient: name,
                    quantity: quantity,
                });
                document.getElementById("ingredient_name").value = "";
                document.getElementById("ingredient_quantity").value = "";
            }
        },
        removeFromtable(index) {
            this.ingredients.splice(index);
        },
        add_recipe() {
            let recipe_info = new FormData();
            let ready = false;
            const all_images = document.getElementById("files").files;
            const first_image = document.getElementById("head_file").files[0];
            if (first_image !== undefined) {
                recipe_info.append("head_image", first_image); // first image of recipe
                ready = true;
            }
            if (all_images.length < 4) {
                for (let index = 0; index < all_images.length; index++) {
                    recipe_info.append("image_" + index, all_images[index]);
                }
                ready = true;
            } else {
                this.$refs.status.Display(
                    "warning",
                    "",
                    "لا يكمن اختيار اكثر من 3 صور "
                );
                ready = false;
            }

            recipe_info.append("ingredients", JSON.stringify(this.ingredients));
            recipe_info.append("name", this.name_recipe);
            recipe_info.append("source", this.source_recipe);
            recipe_info.append("url_video", this.url_video);
            recipe_info.append("selected_type", this.selected_type);
            recipe_info.append("how_todo", this.how_todo);
            if (this.update_recipe_id > 0) {
                recipe_info.append("update_recipe_id", this.update_recipe_id);
            }

            if (ready === true) {
                axios({
                    method: "post",
                    url: "recipe/" + this.update_recipe_id,
                    data: recipe_info,
                })
                    .then((response) => {
                        if (response.data) {
                            const rs = response.data;
                            this.$refs.status.Display(
                                rs.class,
                                rs.message,
                                rs.status
                            );
                            this.erros_recipe = "";
                            this.getRecipe(this.update_recipe_id);
                        }
                    })
                    .catch((error) => {
                        const er = error.response.data;
                        this.$refs.status.Display("danger", er.message, "خطاء");
                    });
            }
        },
        clearForm(action) {
            if (action == "add-recipe") {
                if (this.erros_recipe.length == 0) {
                    this.name_recipe = "";
                    this.source_recipe = "";
                    this.url_video = "";
                    this.ingredients = {};
                    this.how_todo = "";
                    this.update_recipe = "";
                    this.update_recipe_id = "";
                }
            }
        },
        removeOtherImage(image_id) {
            // const data = new FormData();
            // data.append("image_id", image_id);
            // data.append("recipe_name", this.update_recipe.name);
            axios({
                method: "delete",
                url: "recipe/image/" + image_id,
            })
                .then((response) => {
                    if (response.data) {
                        const rs = response.data;
                        this.$refs.status.Display(
                            rs.class,
                            rs.message,
                            rs.status
                        );
                        this.getRecipe(this.update_recipe_id);
                    }
                })
                .catch((error) => { });
        },
    },
};
</script>

<style>
.formkit-messages {}
</style>
