<template>
    <div>
        <status ref="status"></status>
        <div class="container">
            <h1 class="title text-center text-capitalize border-bottom mb-2">Types Recipes</h1>
            <div class="d-grid gap-2">
                <div class="add-type">

                    <button type="button" class="btn btn-primary d-flex flex-center gap-2 px-5"
                        @click="show_form_add_type = true">
                        <span class="fa fa-add"></span></button>
                </div>
                <table class="bg-white border mx-auto shadow-sm table table-bordered table-hover">
                    <thead class="bg-green text-center text-white">
                        <tr>
                            <th scope="col text-capitalize" class="text-left w-10">#</th>
                            <th scope="col text-capitalize" class="text-left">name</th>
                            <th scope="col text-capitalize" class="w-1">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in types_recipe">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td>{{ item.type }}</td>
                            <td class="">
                                <div class="text-center">
                                    <li class="m-1 pointer" @click="DeleteType(item.id)">
                                        <span class="fa fa-trash  text-danger"></span>
                                    </li>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Form add type -->
            <div class="bg-white d-grid left-25 p-3 position-fixed rounded-5 shadow top-45 w-50" v-if="show_form_add_type">
                <span class="fa fa-remove m-2 pointer" @click="show_form_add_type =false"></span>
                <h1 class="border-bottom text-center">Add type</h1>
                <form class="d-grid form-group gap-3">
                    <input type="text" class="form-control" v-model="type" placeholder="type . . . .">
                    <button class="btn btn-primary" @click="AddType()">
                        <span class="fa fa-add"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        this.getTypes();
    },
    data() {
        return {
            types_recipe: '',
            type: '',
            show_form_add_type: false,
        }
    },
    methods: {
        getTypes() {
            axios.get("/panel/types")
                .then((response) => {
                    if (response.data) {
                        this.types_recipe = response.data.types;
                    }
                })
                .catch((error) => {
                    alert('Wrong Request failed types');
                });
        },
        DeleteType(type_id) {
            let data = new FormData();
            data.append('type_id', type_id);
            data.append('_method', 'DELETE');
            axios.post("/panel/types/" + type_id, data)
                .then((response) => {
                    if (response.data.status == 'Deleted') {
                        this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                        this.getTypes();
                    }
                })
                .catch((error) => {
                    this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                });
        },
        AddType() {
            let data = new FormData();
            data.append('type', this.type);
            // data.append('_method', 'DELETE');
            axios.post("/panel/types", data)
                .then((response) => {
                    if (response.data.status == 'Done') {
                        this.show_form_add_type = false;
                        this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                        this.getTypes();
                    }
                })
                .catch((error) => {
                    this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                });
        },
    },
}
</script>
<style></style>