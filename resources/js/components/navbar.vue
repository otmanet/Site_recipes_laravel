<template>
  <div>
    <el-table
      :data="recipes.filter(data => !search || data.recipe_name.toLowerCase().includes(search.toLowerCase()))"
      style="width: 100%"
    >
      <el-table-column label="Date" prop="created_at"></el-table-column>
      <el-table-column label="Recipe_ame" prop="recipe_name"></el-table-column>
      <el-table-column align="right">
        <template slot="header" slot-scope="scope">
          <el-input v-model="search" size="mini" placeholder="Type to search" />
        </template>
        <template slot-scope="scope">
          <el-button size="mini" @click="handleEdit(scope.$index, scope.row)">Edit</el-button>
          <el-button size="mini" type="danger" @click="handleDelete(scope.$index, scope.row)">Delete</el-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<style lang="scss" scoped>
.page-container {
  width: 100%;
  height: 100%;
}
.md-app {
  height: 100%;
  border: 1px solid rgba(#000, 0.12);
}
.content {
  background-color: #a8a8a8;
}
#navbar-top {
  background-color: #ffffff;
}
// Demo purposes only
.md-drawer {
  width: 230px;
  max-width: calc(100vw - 125px);
}
</style>

<script>
export default {
  data: () => ({
    search: "",

    recipes: []
  }),
  methods: {
    getRecipe() {
      axios
        .get("/getrecipe")
        .then(response => {
          console.log(response.data);
          this.recipes = response.data.recipes;
        })
        .catch(error => {
          console.log("error :", error);
        });
    },
    handleEdit(index, row) {
      console.log(index, row);
    },
    handleDelete(index, row) {
      console.log(index, row);
    }
  },
  mounted() {
    this.getRecipe();
  }
};
</script>