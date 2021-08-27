<div style="992px" v-for="typerecipe in typerecipes">
    <div style="float: right;margin-left: 20px;height: 100%;">
        <div class="card text-white  flex-md-row mb-4 shadow-sm h-md-250" style="background-color: #14bf96">
            <div class="wrapper-content">
                <div class="content14" style="width: 200px; height: 250px">
                    <div class="images" v-for="img in typerecipe.image_recipe" style="width: 200px; height: 250px">
                        <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]"
                            :src="'files/'+img.photo" style="width: 200px; height: 250px">
                    </div>
                </div>
            </div>
            {{-- <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]"
                :src="'files/'+typerecipe.photo" style="width: 200px; height: 250px"> --}}
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-white">
                    <p style="font-size: 23px;color:#fff;justify-content: space-between">
                        @{{typerecipe.recipe_name.substring(0,15)+".."}} :</p>
                </strong>
                {{-- <h6 class="mb-0">
                                    <a class="text-white" href="#">Food for Thought: Diet and Brain Health</a>
                                </h6> --}}
                <div>@{{typerecipe.created_at.substring(0,10)}}</div>

                <div style="width:300px;height: 80px;">
                    <p style="text-align: right;text-overflow: ellipsis;">

                        @{{typerecipe.recipe_description.substring(0,100)+".."}}
                    </p>

                </div>

                <a class="btn btn-outline-info"
                    style="position: absolute;bottom:0;margin-bottom: 5px;left:10px;border-color: white;"
                    @click.prevent="showrecipe(typerecipe)">
                    انقر هنا
                    للمزيد</a>
            </div>
        </div>
    </div>
</div>
