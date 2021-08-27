

var app = new Vue({
    el: "#T",
    data() {
        return {
            open: {
                login: false,
                ins: false,
                popup: false,
                content: true,
                inf_recipe: false,
                zoom_image: false,
                showtype: false,
                showsearch: false,
            },
            user_recipes: [],
            recipe: {
                id: "",
                recipe_name: "",
                recipe_description: "",
                type_id: "",
            },
            images: [],
            ingredients: [],
            steps: [],
            img: {
                id: "",
                photo: "",
                recipe_id: "",
            },
            types: [],
            type: {
                id: "",
                name: "",
                name_ar: "",
            },
            typerecipes: [],
            typerecipe: {
                id: "",
                recipe_name: "",
                recipe_description: "",
                type_id: "",
                created_at: "",
                updated_at: "",
                deleted_at: "",
            },
            search: '',
            searchRecipe: '',
            searchRecipes: [],
        };
    },
    methods: {
        showLogin: function () {
            this.open.popup = !this.open.popup;
            // this.open.login = !this.open.login;
            // this.open.ins = false;
        },
        closePopup: function () {
            this.open.popup = false;
            this.open.login = false;
            this.open.ins = false;
        },
        showins: function () {
            this.open.popup = !this.open.popup;
            this.open.login = false;
            this.open.ins = !this.open.ins;
        },
        getData: function () {
            axios
                .get("/user_recipe/")
                .then(response => {
                    console.log(response.data);
                    this.user_recipes = response.data.user_recipes;
                    this.recipe_id = response.data.user_recipes.id;
                    this.types = response.data.types;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        showrecipe: function (recipe) {
            axios
                .get("/getrecipe/" + recipe.id)
                .then(response => {
                    this.open.content = false;
                    this.open.inf_recipe = true;
                    this.open.showtype = false;
                    this.open.showsearch = false;
                    this.images = response.data.images;
                    this.ingredients = response.data.ingredients;
                    this.steps = response.data.steps;
                })
                .catch(error => {
                    console.log("error :", error);
                });
        },
        show: function (type) {
            axios
                .get("/showrecipe/" + type.id)
                .then(response => {
                    this.open.content = false;
                    this.open.inf_recipe = false;
                    this.open.showtype = true;
                    this.open.showsearch = false;
                    this.typerecipes = response.data.typerecipes;
                }).catch(error => {
                    console.log(error);
                })
        },
        zoomimage: function (img) {
            this.open.zoom_image = true;
            this.img = img;

        },
        closezoom: function () {
            this.open.zoom_image = false;
        },
        returnhome: function () {
            this.open.content = true;
            this.open.inf_recipe = false;
        },
        SearchRecipe: function (search) {
            axios
                .get('/search/' + search)
                .then(response => {
                    this.open.content = false;
                    this.open.inf_recipe = false;
                    this.open.showtype = false;
                    this.open.showsearch = true;
                    this.searchRecipes = response.data.searchRecipes;
                }).catch(error => {
                    console.log(error);
                });
        }
    },
    mounted() {
        this.getData();
    }
});

