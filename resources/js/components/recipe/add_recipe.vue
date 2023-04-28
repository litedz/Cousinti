<template>
  <status ref="status"></status>
  <h1>{{ this.update_recipe_id }}</h1>

  <div class="add_recipe bg-white mb-5 mx-auto p-3 rounded shadow w-75" dir="rtl">
    <h3 class="text-center text-info">
      <span class="fa fa-plus-circle m-1 font-1"></span>اضافة وصفة جديدة
    </h3>

    <div v-if="this.erros_recipe">
      <div class="alert alert-danger" v-for="er in this.erros_recipe" :key="er">
        <li>{{ er[0] }}</li>
      </div>
    </div>
    <FormKit type="form" :actions="false">
      <FormKit type="text" name="name" v-model="name_recipe" input-class="form-control mt-2" label="اسم الوصفة :"
        label-class="text-weight-800" help="اسم الوصفة لا يجب ان يحتوي علي ارقام" help-class="text-black-50"
        validation="required" />

      <FormKit type="text" name="source" v-model="source_recipe" input-class="form-control" outer-class=" mt-3"
        label="المصدر :" label-class="text-weight-800" help="مصدر الوصفة او اسم الشيف" help-class="text-black-50"
        validation="required" />

      <label for="type" class="text-weight-800 mt-3 mb-1">اختر نوع الوصفة :</label>
      <select class="form-select" validate="required" v-model="selected_type" id="select_type"
        aria-label="Default select example">
        <option :value="val.id" v-for="val in this.types_recipe" :key="val.e">
          {{ val.type }}
        </option>
      </select>

      <FormKit type="url" value="www.youtube.com" name="video" v-model="url_video" input-class="form-control"
        outer-class=" mt-3" label="مقطع الفيديو :" label-class="text-weight-800" help="يجب ان يكون الرابط من اليوتيوب "
        help-class="text-black-50" validation="" />
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
              <td class="text-center">{{ key.name_ingredient }}</td>
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
            outer-class="ms-3 border-start p-1" label-class="text-weight-800" help="اسم المكون" help-class="text-black-50"
            validation="required" />

          <FormKit type="text" name="quantity" id="ingredient_quantity" input-class="form-control mt-2"
            outer-class="ms-3 p-1" label-class="text-weight-800" help="الكمية باالغارم (g)" help-class="text-black-50"
            @keydown.enter="add_ingredient_table" validation="required" />


          <button type="button" class="fa fa-2x fa-check-circle text-success pointer  border-0 bg-transparent"
            @click="add_ingredient_table()" @keyup.enter="add_ingredient_table"></button>
        </div>
        <div class="align-items-center d-flex justify-content-start">
          <p class="fs-3 fw-bolder m-1 text-black-50 text-weight-500">اضافة مكونات</p>
          <span>
            <i @click="show_inputs = 'add_ingredient_table'" class="
                    border
                    fa fa-2 fa-plus-circle
                    font-3
                    rounded-circle
                    text-bg-info text-white
                    m-1
                    pointer
                  " aria-hidden="true"></i></span>
        </div>


      </div>
    </FormKit>
    <FormKit type="text" name="level" v-model="level" input-class="form-control mt-2" label="مستوي الصوفة :"
      label-class="text-weight-800" help="الحقل الافتراضي هو (مبتدئ)" help-class="text-black-50"
      placeholder="مبدئ -متوسط - صعب" validation="required" />
    <div class="images mt-4">
      <FormKit type="file" id="head_file" name="files" label="الصورة الرئيسبة :" label-class="text-weight-500"
        file-remove-class="btn btn-primary m-2" input-class="form-control mt-2" validation="required|file" />

      <FormKit type="file" id="files" multiple name="files" label="الصور :" label-class="text-weight-500"
        file-remove-class="btn btn-primary m-2" input-class="form-control mt-2" validation="required|file" />
    </div>

    <FormKit type="form" :actions="false">
      <div class="how_todo mt-4">
        <FormKit type="textarea" label="طريقة التحضير" label-class="font-3 mb-2 text-weight-800" v-model="how_todo"
          input-class="form-control" rows="10" validation="required|length:25"
          placeholder="مثال: لدينا اولا مزج البيض مع الفرينة" help="يجب ان لا يقل النص 200 حرف "
          help-class="text-black-50" />
      </div>
      <FormKit type="button" input-class="btn btn-primary mt-2" @click="add_recipe()">اضافة الوصفة<span
          class="fa fa-plus-circle m-2 text-white"></span></FormKit>
    </FormKit>
  </div>
</template>

<script>
export default {
  inject: ["w_path"],
  mounted() {
    this.getTypeRecipes();
  },
  activated() {
    this.clearForm();
    this.erros_recipe = [];
  },
  deactivated() { },

  data() {
    return {
      update_recipe: "",
      update_recipe_id: "",
      name_recipe: "",
      source_recipe: "",
      url_video: [],
      level: '',
      selected_type: "",
      types_recipe: [],
      ingredients: [],
      images: [],
      how_todo: "",
      show_inputs: "",
      erros_recipe: [],
    };
  },
  methods: {
    clearForm(action) {
      if (this.erros_recipe.length == 0) {
        this.name_recipe = "";
        this.source_recipe = "";
        this.url_video = "";
        this.selected_type = "";
        document.getElementById("files").value = null;
        document.getElementById("head_file").value = null;
        this.ingredients = [];
        this.how_todo = "";
        this.update_recipe = "";
        this.update_recipe_id = "";
      }
    },
    getTypeRecipes() {
      axios({ method: "get", url: "types_recipe" })
        .then((response) => {
          if (response.data) {
            for (let index = 0; index < response.data.length; index++) {
              const element = response.data[index];
              this.types_recipe.push(element);
            }
          }
        })
        .catch((error) => { });
    },
    add_ingredient_table() {
      var name = document.getElementById("ingredient_name").value;
      var quantity = document.getElementById("ingredient_quantity").value;
      if (name.length != 0 && quantity.length != 0) {
        this.ingredients.push({ name_ingredient: name, quantity: quantity });
        document.getElementById("ingredient_name").value = "";
        document.getElementById("ingredient_quantity").value = "";
      }
    },
    removeFromtable(index) {
      this.ingredients.splice(index);
    },
    add_recipe() {
      let ready = false;
      let recipe_info = new FormData();
      const all_images = document.getElementById("files").files;
      const first_image = document.getElementById("head_file").files[0];
      if (first_image !== undefined) {
        recipe_info.append("head_image", first_image); // first image of recipe
        ready = true;
      }
      if (all_images.length > 4 || all_images == null) {
        this.$refs.status.Display(
          "warning",
          "لا يكمن اختيار اكثر من 3 صور ",
          "خطا في الصور "
        );

        ready = false;
      } else {
        for (let index = 0; index < all_images.length; index++) {
          recipe_info.append("image_" + index, all_images[index]);
        }
        ready = true;
      }
      recipe_info.append("ingredients", JSON.stringify(this.ingredients));
      recipe_info.append("name", this.name_recipe);
      recipe_info.append("source", this.source_recipe);
      recipe_info.append("url_video", this.url_video);
      recipe_info.append("selected_type", this.selected_type);
      recipe_info.append("how_todo", this.how_todo);
      recipe_info.append("level", this.level);

      if (ready === true) {
        axios({
          method: "post",
          url: "recipe",
          data: recipe_info,
        })
          .then((response) => {
            if (response.data) {
              this.erros_recipe = [];
              const rs = response.data;
              this.$refs.status.Display(rs.class, rs.message, rs.status);
              if (rs.message) {
                this.clearForm();
              }
              this.erros_recipe = "";
            }
          })
          .catch((error) => {
            if (error.response.data.message.length !== 0) {
              this.$refs.status.Display('danger', error.response.data.message, "تحذير");
            }

          });
      }
    },
  },
};
</script>

<style>
.formkit-messages {
  color: red;
}
</style>
