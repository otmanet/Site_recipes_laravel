<div class="container">
    <div class="cadr">
        <div class="row">
            <div class="f">
                <ul>

                    <li v-if="errors.recipe_name" class="errors">@{{errors.recipe_name[0]}}</li>
                    <li v-if="errors.recipe_description" class="errors">@{{errors.recipe_description[0]}}</li>
                    <li v-if="errors.type_recipes" class="errors">@{{errors.type_recipes[0]}}</li>
                </ul>
                <form @submit.prevent="addRecipe" method="post">
                    <div class="form-group" style="margin-bottom: 60px;margin-top: 60px">
                        <el-input class="input" placeholder=" اسم الوصفة" name="recipe_name"
                            v-model="recipe.recipe_name">
                    </div>
                    <div class="form-group" style="margin-bottom: 60px">
                        <textarea class="input" placeholder="وصف الوصفة" name="recipe_description"
                            v-model="recipe.recipe_description">
                        </textarea>

                    </div>

                    <select v-model="recipe.type_id" class="form-group select-css" name="type_id"
                        style="margin-bottom: 60px">
                        <option value="" disabled selected>اختر نوع الوصفة</option>
                        <optgroup v-for="type in types">
                            <option :value="type.id">
                                @{{type.id}}- @{{type.name_ar}}
                        </optgroup>
                        </option>
                    </select>

                    <div @click="updateRecipe" class="button-form1" v-if="open.edit">
                        <a>تحديث</a>
                    </div>
                    <button v-else class="button-form" type="submit">أضف</button>
                    </from>

            </div>
        </div>

    </div>
</div>
