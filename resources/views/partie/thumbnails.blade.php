<div class="recipe">
    <div class="recipe__thumbnail">
        <div class="button_heart">
            <a class="active">
                <i class="fas fa-heart"></i>
            </a>
        </div>

        <div v-for="imge in urecipe.image_recipe" @click="showrecipe(urecipe)">
            <img class="recipe__image" :src="'files/'+imge.photo">

        </div>

        <div class="recipe__ring"></div>
        <div class="recipe__ring recipe__ring--outer"></div>
        <div class="recipe__label" @click="showrecipe(urecipe)">
            <p style="margin-top: 25px;font-size: 25px;color: #14bf96;">@{{urecipe.recipe_name}}</p>
            <p class="capital">@{{urecipe.recipe_description}} </p>
        </div>
    </div>
</div>
