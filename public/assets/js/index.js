

var app = new Vue({
    el: "#I",
    data() {
        return {
            active: 0,
            step: 1,
            totalsteps: 3,
            maessage: "recipe",
            open: {
                index: false,
                popup: false,
                edit: false,
                image: false,
                pictures: true,
                upload_form: false,
                ingredient: false,
                edit_ingredient: false,
                upload_edit: false,
                img_zoom: false,
                steprecipe: false,
                editsteps: false,
                tableRecipe: true,
                tableUser: false,
                editUser: false,
                typerecipe: false,
                tableType: false,
                buttonedittype: false,
            },
            recipes: [],
            recipe: {
                id: "",
                type_id: "",
                recipe_name: "",
                recipe_description: "",
            },
            images: [],
            img: {
                id: "",
                photo: "",
                recipe_id: ""
            },
            ingredients: [],
            ingredient: {
                id: "",
                desc_integeredient: "",
                recipe_id: ""
            },
            steps: [],
            steprecipe: {
                id: "",
                desc_steps: "",
                recipe_id: "",
            },
            recipeid: "",
            errors: [],
            users: [],
            user: {
                id: "",
                name: "",
                email: "",
                is_admin: "",
                created_at: ""
            },
            userCount: "",
            recipeCount: "",
            typeCount: "",
            types: [],
            type: {
                id: "",
                name: "",
                name_ar: ""
            },
            tests: [],
        };
    },
    methods: {
        next: function () {
            if (this.active++ > 2) this.active = 0;
        },
        nextStep: function () {
            this.step++;
            this.open.upload_form = false;
            this.open.ingredient = false;
        },
        prestep: function () {
            this.step--;
            this.open.upload_form = false;
            this.open.ingredient = false;
            this.open.steprecipe = false;
        },
        pictures: function () {
            this.step = 1;
            this.open.ingredient = false;
            this.open.steprecipe = false;
        },
        nextstepintre: function () {
            this.step = 2;
            this.open.upload_form = false;
            this.open.steprecipe = false;
        },
        nextstepsteps: function () {
            this.step = 3;
            this.open.upload_form = false;
            this.open.ingredient = false;
        },
        openIndex: function () {
            this.open.popup = !this.open.popup;
            this.open.index = !this.open.index;
            this.open.edit = false;
            this.open.editUser = false;
            this.open.image = false;
            this.open.typerecipe = false;
            this.recipe.recipe_name = '';
            this.recipe.recipe_description = '';
            this.recipe.type_recipes = '';
            this.type.name_ar = '';
            this.type.name = '';
            this.type.id = '';
        },
        opentyperecipe: function () {
            this.open.popup = !this.open.popup;
            this.open.typerecipe = true;
            this.open.edit = false;
            this.open.editUser = false;
            this.open.image = false;
            this.open.index = false;

        },
        closePopup: function (recipe) {
            this.open.popup = false;
            this.open.index = false;
            this.open.edit = false;
            this.step = 1;
            this.open.image = false;
            this.open.upload_form = false;
            this.open.edit_ingredient = false;
            this.open.ingredient = false;
            this.open.steprecipe = false;
            this.open.editsteps = false;
            this.open.editUser = false;
            this.open.typerecipe = false;
            this.getRecipe();
        },
        openTableUser: function () {
            this.open.tableRecipe = false;
            this.open.tableUser = true;
            this.open.tableType = false;
        },
        openTableRecipe: function () {
            this.open.tableRecipe = true;
            this.open.tableUser = false;
            this.open.tableType = false;
        },
        openTableType: function () {
            this.open.tableRecipe = false;
            this.open.tableUser = false;
            this.open.tableType = true;
        },
        getRecipe: function () {
            axios
                .get("/getrecipe")
                .then(response => {
                    console.log(response.data);
                    this.recipes = response.data.recipes;
                    this.users = response.data.users;
                    this.userCount = response.data.userCount;
                    this.recipeCount = response.data.recipeCount;
                    this.typeCount = response.data.typeCount;
                    this.types = response.data.types;
                })
                .catch(error => {
                    console.log("error :", error);
                });
        },
        addType: function () {
            axios.post("/addtype", this.type)
                .then((response) => {
                    if (response.data.etat) {
                        this.types.push(response.data.types);
                        this.closePopup();
                        this.type = {
                            id: "",
                            name: "",
                            name_ar: "",
                        }
                        this.getRecipe();
                    }
                }).catch(function (error) {
                    console.log(error);
                })
        },
        deleteType: function (type) {
            Swal.fire({
                title: "هل أنت واثق؟",
                text: "لن تتمكن من التراجع عن هذا!",
                icon: "warning",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "نعم"
            }).then(result => {
                axios
                    .delete("/deletype/" + type.id)
                    .then(response => {
                        if (response.data.etat) {
                            this.getRecipe();
                            this.hasDeleted = false;
                        }
                    }).catch(error => {
                        console.log(error);
                    });
                if (result.value) {
                    Swal.fire("تم الحذف!", "تم حذف ملفك.", "نجاح");
                }
            });
        },
        editType: function (type) {
            this.open.popup = !this.open.popup;
            this.open.typerecipe = !this.open.typerecipe;
            this.open.buttonedittype = true;
            // this.open.index = false;
            // this.open.edit = false;
            // this.open.image = false;
            // this.open.editUser = false;
            this.type = type;
        },
        updateType: function () {
            axios
                .put("/updatetype", this.type)
                .then(response => {
                    if (response.data.etat) {
                        this.open.popup = false;
                        this.open.typerecipe = false;
                        this.open.buttonedittype = false;
                        this.getRecipe();
                        this.type = {
                            id: "",
                            name: "",
                            name_ar: ""
                        };
                    }
                }).catch(error => {
                    console.log(error);
                });
        },
        addRecipe: function () {
            this.errors = [];
            axios
                .post("/addrecipe/", this.recipe)
                .then(response => {
                    if (response.data.etat) {
                        this.open.popup = true;
                        this.open.image = true;
                        this.open.edit = false;
                        this.open.index = false;
                        this.getRecipe();
                        this.recipeid = response.data.recipeid;
                        this.images = response.data.images;
                        this.ingredients = response.data.ingredients;
                        this.steps = response.data.steps;
                    }
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },
        openEdit: function (recipe) {
            this.open.popup = !this.open.popup;
            this.open.index = !this.open.index;
            this.open.typerecipe = false;
            this.open.edit = true;
            this.open.image = false;
            this.open.editUser = false;
            this.recipe = recipe;
        },
        updateRecipe: function () {
            axios
                .put("/updaterecipe/", this.recipe)
                .then(response => {
                    if (response.data.etat) {
                        this.open.index = false;
                        this.open.popup = false;
                        this.recipe = {
                            id: "0",
                            recipe_name: "",
                            recipe_description: "",
                            type_recipes: ""
                        };
                        this.open.edit = false;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        deleteRecipe: function (recipe) {
            Swal.fire({
                title: "هل أنت واثق؟",
                text: "لن تتمكن من التراجع عن هذا!",
                icon: "warning",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "نعم"
            }).then(result => {
                axios
                    .delete("/deleterecipe/" + recipe.id)
                    .then(response => {
                        this.getRecipe();
                        this.hasDeleted = false;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                if (result.value) {
                    Swal.fire("تم الحذف!", "تم حذف ملفك.", "نجاح");
                }
            });
        },
        showRecipe: function (recipe) {
            axios
                .get("/show/" + recipe.id)
                .then(response => {
                    this.recipeid = response.data.recipeid;
                    console.log(response.data);
                    this.images = response.data.images;
                    this.ingredients = response.data.ingredients;
                    this.steps = response.data.steps;
                    this.open.popup = !this.open.popup;
                    this.open.image = !this.open.image;
                    this.open.edit = false;
                    this.open.index = false;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        uploadImage: function () {
            this.open.upload_form = !this.open.upload_form;
        },
        addImage: function (recipeid) {
            var vm = this;
            var formdata = new FormData(vm.$refs.form);
            axios
                .post("/addimage/" + recipeid, formdata, this.img)
                .then(response => {
                    if (response.data.etat) {
                        this.open.upload_form = false;
                        console.log(response);
                        this.img = response.data;
                        this.images.push(this.img);
                        this.recipe.photo = this.img;
                    }
                    this.dialogVisible = true;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        deleteImage: function (img) {

            axios
                .delete("/deleteimage/" + img.id)
                .then(response => {
                    if (response.data.etat) {
                        var index = this.images.indexOf(img.id);
                        this.images.splice(index, 1);
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "تم حذف عملك",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        imagezoom: function (img) {
            this.open.img_zoom = true;
            this.img = img;
        },
        openingredient: function () {
            this.open.ingredient = !this.open.ingredient;
            this.open.edit_ingredient = false;
        },
        addIngredient: function (recipeid) {
            var vm = this;
            var formdata1 = new FormData(vm.$refs.form1);
            axios
                .post("/addingerdient/" + recipeid, formdata1, this.ingredient)
                .then(response => {
                    if (response.data.etat) {
                        console.log(response.data);
                        this.ingredient = response.data;
                        this.ingredients.push(this.ingredient);
                        this.open.ingredient = false;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        deleteIngredient: function (ingredient) {
            axios
                .delete("/deleteingredient/" + ingredient.id)
                .then(response => {
                    if (response.data.etat) {
                        let index = this.ingredients.indexOf(this.ingredient);
                        this.ingredients.splice(index, 1);
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "تم حذف عملك",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        editingredient: function (ingredient) {
            this.open.ingredient = false;
            this.open.edit_ingredient = true;
            this.ingredient = ingredient;
        },
        updateingredient: function () {
            axios
                .put("/updateingredient/", this.ingredient)
                .then(response => {
                    if (response.data.etat) {
                        this.open.edit_ingredient = false;
                        this.ingredient = {
                            id: "",
                            desc_integeredient: "",
                            recipe_id: ""
                        };
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        opensteps: function () {
            this.open.steprecipe = !this.open.steprecipe;
            this.open.editsteps = false;
        },
        addSteps: function (recipeid) {
            var vm = this;
            var formdata2 = new FormData(vm.$refs.form2);
            axios
                .post("/addstep/" + recipeid, formdata2, this.steprecipe)
                .then(response => {
                    if (response.data.etat) {
                        console.log(response.data);
                        this.steprecipe = response.data;
                        this.steps.push(this.steprecipe);
                        this.open.steprecipe = false;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        Deletestep: function (steprecipe) {
            axios
                .delete("/deletestep/" + steprecipe.id)
                .then(response => {
                    if (response.data.etat) {
                        let index = this.steps.indexOf(this.steprecipe);
                        this.steps.splice(index, 1);
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "تم حذف عملك",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        editsteps: function (steprecipe) {
            this.open.steprecipe = false;
            this.open.editsteps = true;
            this.steprecipe = steprecipe;
        },
        Updatesteps: function () {
            axios
                .put("/updatesteps/", this.steprecipe)
                .then(response => {
                    if (response.data.etat) {
                        this.open.editsteps = false;
                        this.steprecipe = {
                            id: "",
                            desc_steps: "",
                            recipe_id: "",
                        };
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        deleteUser: function (user) {
            axios
                .delete("/deleteuser/" + user.id)
                .then(response => {
                    if (response.data.etat) {
                        let index = this.users.indexOf(this.user);
                        this.getRecipe();
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "تم حذف عملك",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        EditUser: function (user) {
            this.open.popup = !this.open.popup;
            this.open.index = false;
            this.open.edit = false;
            this.open.image = false;
            this.open.editUser = true;
            this.user = user;
        },
        updateUser: function () {
            axios
                .put("/UpdateUser/", this.user)
                .then((response) => {
                    if (response.data.etat) {
                        this.getRecipe();
                        this.user = {
                            id: "",
                            name: "",
                            email: "",
                            is_admin: "",
                            created_at: ""
                        }
                        this.open.popup = !this.open.popup;
                        this.open.index = false;
                        this.open.edit = false;
                        this.open.image = false;
                        this.open.editUser = false;

                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
    mounted() {
        this.getRecipe();
    }
});
