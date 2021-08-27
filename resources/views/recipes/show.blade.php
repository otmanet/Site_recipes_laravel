<div class="wrapper">
    <div v-if="open.img_zoom" class="zoom_img">
        <a @click="open.img_zoom=false">
            <svg class="svg-icon-close-img" viewBox="0 0 20 20">
                <path
                    d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z">
                </path>
            </svg>
        </a>
        <el-image class="image" :src="'files/'+img.photo" style="width: 35%; height: 50%">
        </el-image>
    </div>
    <div class="stepper-recipes">
        <section v-if="step == 1">
            <div class="cadr-show">
                <div class="navbar-show">
                    <div class="item-navbar">
                        <div @click.prevent="pictures()" class="item-navbar1-step1">
                            <p class="p-barre-stepper">صور</p>
                        </div>
                        <div class="border-simple"></div>
                        <div @click.prevent="nextstepintre()" class="item-navbar2-step1">
                            <p class="p-barre-stepper">مكونات</p>
                        </div>
                        <div class="border-simple"></div>
                        <div @click.prevent="nextstepsteps()" class="item-navbar3-step1">
                            <p class="p-barre-stepper">خطوات</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body1">
                <div class="scrollbar scrollbar-danger" style="width: 95%;height:500px;">
                    <div class="force-overflow">
                        <div class="button-add" v-if="open.pictures">
                            <el-button @click="uploadImage()" type="danger" class="button-add-image" circle plain>
                                <i class="fas fa-plus"></i>
                            </el-button>
                        </div>
                        <div class="form" v-if="open.upload_form">
                            <template>
                                <form class="form-upload" ref="form" enctype="multipart/form-data">
                                    <div @click="open.upload_form=false">
                                        <i class="fas fa-times"></i>
                                    </div>

                                    <div class="file-input-dashed">
                                        <label for="input1">
                                            <p> انقر في هذه المنطقة.</p>
                                        </label>
                                        <input id="input1" type="file" name="photos[]" accept="image/*" multiple>
                                    </div>
                                    <el-button @click="addImage(recipeid)" type="info" plain round
                                        style="margin-bottom: 6px;">
                                        تحميل
                                    </el-button>
                                </form>
                            </template>
                        </div>
                        <div class="container-fluid" style="background-position:center">
                            <div class="row">

                                <div class="col-sm-12 col-md-4" v-for="img in images">
                                    <div class="thumbnail row">
                                        <div class="con">

                                            <el-image class="image" :src="'files/'+img.photo" style="width: 100%; ">
                                            </el-image>

                                            <div class="overlay">
                                                <div class="centered" style="width: 100%">
                                                    <div class="caption col-md-12 col-sm-6 col-xs-6"
                                                        style="width: 100%">
                                                        <el-button @click.prevent="deleteImage(img)" type="danger"
                                                            icon="el-icon-delete" plain circle>
                                                        </el-button>
                                                        <el-button @click="imagezoom(img)" class="info"
                                                            icon="el-icon-zoom-in" plain circle>
                                                        </el-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <section v-if="step == 2">
            <div class="cadr-show">
                <div class="navbar-show">
                    <div class="item-navbar">
                        <div @click.prevent=" pictures()" class="item-navbar1-step2">
                            <p class="p-barre-stepper">صور</p>
                        </div>
                        <div class="border"></div>
                        <div @click.prevent="  nextstepintre()" class="item-navbar2-step2">
                            <p class="p-barre-stepper">المكونات</p>
                        </div>
                        <div class="border-simple"></div>
                        <div @click.prevent=" nextstepsteps()" class="item-navbar3-step2">
                            <p class="p-barre-stepper">خطوات</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-body2">
                <div class="scrollbar scrollbar-danger" style="width: 95%;height:500px;">
                    <div class="force-overflow">
                        <div class="button-add">
                            <el-button @click="openingredient()" type="danger" class="button-add-image" circle plain>
                                <i class="fas fa-plus"></i>
                            </el-button>

                            <div v-if="open.ingredient">
                                <template>
                                    <form ref="form1" enctype="multipart/form-data">

                                        <div id="dynamicInput">
                                            <input type="text" name="desc_integeredients[]" class="form-control"
                                                placeholder="أضف مكوناتك..." multiple style="margin-bottom: 25px">

                                        </div>
                                        <el-button id="b1" type="primary" onClick="addInput('dynamicInput');" plain
                                            circle>
                                            <i class="fas fa-plus"></i>
                                        </el-button>
                                        <el-button @click="addIngredient(recipeid)" class="button_int" type="info" plain
                                            round style="margin-bottom: 6px;">
                                            أضف
                                        </el-button>
                                    </form>
                                </template>
                            </div>
                            <div v-if="open.edit_ingredient">
                                <form>
                                    <div class="form-group">
                                        <input type="text" v-model="ingredient.desc_integeredient" class="form-control">
                                    </div>
                                    <el-button @click.prevent="updateingredient()" type="info" plain round
                                        class="button_int">
                                        تعديل</el-button>
                                </form>
                            </div>
                            <div style="width: 90%" class="rectangle-list">
                                <ol>
                                    <li v-for="ingredient in ingredients">

                                        <p class="td-h">
                                            @{{ ingredient.desc_integeredient }}
                                            <a @click.prevent="deleteIngredient(ingredient)">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a @click.prevent="editingredient(ingredient)">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </p>

                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section v-if="step == 3">
            <div class="cadr-show">
                <div class="navbar-show">
                    <div class="item-navbar">
                        <div @click.prevent="pictures()" class="item-navbar1-step3">
                            <p class="p-barre-stepper">صور</p>
                        </div>
                        <div class="border"></div>
                        <div @click.prevent="nextstepintre()" class="item-navbar2-step3">
                            <p class="p-barre-stepper">المكونات</p>
                        </div>
                        <div class="border"></div>
                        <div @click.prevent="nextstepsteps()" class="item-navbar3-step3">
                            <p class="p-barre-stepper">خطوات</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-body3">
                <div class="scrollbar scrollbar-danger" style="width: 95%;height:500px;">
                    <div class="force-overflow">
                        <div class="button-add">
                            <el-button @click="opensteps()" type="danger" class="button-add-image" circle plain>
                                <i class="fas fa-plus"></i>
                            </el-button>
                            <div v-if="open.steprecipe">
                                <template>
                                    <form ref="form2" enctype="multipart/form-data">

                                        <div id="dynamicInput">
                                            <input type="text" name="desc_steps[]" class="form-control"
                                                placeholder="أضف خطوات ..." multiple style="margin-bottom: 25px">
                                        </div>
                                        <el-button id="b2" type="primary" onClick="addInput2('dynamicInput');" plain
                                            circle>
                                            <i class="fas fa-plus"></i>
                                        </el-button>
                                        <el-button @click.prevent="addSteps(recipeid)" class="button_int" type="info"
                                            plain round style="margin-bottom: 6px;">
                                            أضف
                                        </el-button>
                                    </form>
                                </template>
                            </div>
                            <div v-if="open.editsteps">
                                <form>
                                    <div class="form-group">
                                        <input type="text" v-model="steprecipe.desc_steps" class="form-control">
                                    </div>
                                    <el-button @click.prevent="Updatesteps()" type="info" plain round
                                        class="button_int">
                                        تعديل</el-button>
                                </form>
                            </div>
                            <div style="width: 90%" class="rectangle-list">
                                <ol>
                                    <li v-for="steprecipe in steps">

                                        <p class="td-h">

                                            <a @click.prevent="Deletestep(steprecipe)">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a @click.prevent="editsteps(steprecipe)">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @{{ steprecipe.desc_steps }}
                                        </p>

                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <button @click.prevent="prestep" v-if="step !== 1" class="step-pre">
        <svg class="svg-icon-step" viewBox="0 0 20 20">
            <path fill="none"
                d="M11.611,10.049l-4.76-4.873c-0.303-0.31-0.297-0.804,0.012-1.105c0.309-0.304,0.803-0.293,1.105,0.012l5.306,5.433c0.304,0.31,0.296,0.805-0.012,1.105L7.83,15.928c-0.152,0.148-0.35,0.223-0.547,0.223c-0.203,0-0.406-0.08-0.559-0.236c-0.303-0.309-0.295-0.803,0.012-1.104L11.611,10.049z">
            </path>
        </svg>
    </button>


    <button @click.prevent="nextStep" v-if="step != totalsteps" class="step-next">
        <svg class="svg-icon-step" viewBox="0 0 20 20">
            <path fill="none"
                d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z">
            </path>
        </svg>
    </button>
</div>
