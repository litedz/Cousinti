<template >
  <div class="bg-white border mx-auto p-3 rounded shadow table_recipes">
    <status ref="status"></status>
    <table class="table align-middle mb-0 bg-white text-center">
      <caption class="font-3 m-3 text-center"
               v-if="this.recipes.length == 0">
        <div>You dont have any recipe</div>

      </caption>
      <thead class="">
        <tr>
          <th class="p-3">Name Recipe</th>
          <th class="p-3">Tag</th>
          <th class="p-3">Status</th>
          <th class="p-3">Author</th>
          <th class="p-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="recipe in this.recipes"
            :key="recipe"
            class="text-center">
          <td>
            <div class="d-flex mx-auto w-50 align-items-center">
              <!-- <img
                :src="
                  this.w_path +
                  '/storage/' +
                  $attrs.auth_id +
                  '/' +
                  recipe.images_recipe[0].name
                "
                alt=""
                style="width: 45px; height: 45px"
                class="rounded-circle"
              /> -->
              <div class="ms-3">
                <p class="fw-bold mb-1">
                  <a class="text-decoration-none text-black"
                     :href="'/recipes/' + recipe.id">{{ recipe.name }}</a>
                </p>
              </div>
            </div>
          </td>
          <td>
            <p class="text-muted mb-0">{{ recipe.type_recipe.type }}</p>
          </td>
          <td>
            <span class="badge text-success">Active</span>
          </td>
          <td>
          </td>
          <td>
            <a @click="delete_recipe(recipe.id)"
               href="#"
               class="
                fa fa-minus-circle
                text-danger text-decoration-none
                m-1
                font-3
              "></a>
            <a @click="update_recipe(recipe.id)"
               href="#"
               class="fa fa-edit text-info text-decoration-none m-1 font-3"></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { computed } from "vue";
export default {
  inject: ["w_path"],
  activated() {
    this.getRecipes();
  },

  data() {
    return {
      recipes: "",
    };
  },

  methods: {
    update_recipe(recipe_id) {
      this.$emit("some-event", recipe_id);
    },
    delete_recipe(recipe_id) {
      axios({ method: "delete", url: "/recipe/" + recipe_id })
        .then((response) => {
          if (response.data) {
            const rs = response.data;
            this.$refs.status.Display(rs.class, rs.message, rs.status);
            this.getRecipes();
          }
        })
        .catch((error) => { });
    },
    getRecipes() {
      axios({ method: "get", url: "/user/recipes" })
        .then((response) => {
          if (response.data) {
            this.recipes = response.data;
          }
        })
        .catch((error) => { });


    },
  },
};
</script>

<style>
.table_recipes {
  background: hsl(0deg 0% 98%);
}
</style>