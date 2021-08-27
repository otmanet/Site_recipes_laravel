<div class="container-fluid" style="background-position:center">
    <div class="row" v-for="img in images">
        <div class="column">
            <img :src="'files/'+img.photo" style="width:100%" onclick="myFunction(this);">
        </div>

    </div>

    <div class="container">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <img id="expandedImg" style="width:100%;height: 533px;">
        <div id="imgtext"></div>
    </div>
    {{-- <div class="button_cont">
            <a @click="returnhome()" class="example_e">
                الصفحة الرئيسية >>
            </a>
        </div> --}}

    {{-- <div v-for="img in images">
        <div>
            <img class="image" :src="'files/'+img.photo" style="width: 100%;height: 533px">
            </img>
        </div> --}}
    {{-- <div class="thumbnail row">
            <div class="con">
                <div class="conteneur1">

                </div>
                <div class="overlay1">
                    <div class="centered1" style="width: 100%">
                        <div class="caption col-md-12 col-sm-6 col-xs-6" style="width: 100%">
                            <el-button @click="zoomimage(img)" class="info" icon="el-icon-zoom-in" plain circle>
                            </el-button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    {{-- </div> --}}
</div>
<hr>
<div class="float-container">
    <div class="float-child">
        <div class="scrollbar scrollbar-default">
            <p class="p_title">خطوات</p>
            <div class="force-overflow">
                <div class="green">
                    <ol>
                        <li v-for="stp in steps">
                            <p class="p_ingredient">@{{stp.desc_steps}}</p>
                            <hr>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="float-child">
        <div class="scrollbar scrollbar-default">
            <p class="p_title">المكونات</p>
            <div class="force-overflow">
                <div class="green">
                    <ol>
                        <li v-for="ing in ingredients">
                            <p class="p_ingredient">@{{ing.desc_integeredient}}</p>
                            <hr>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="popup1" v-if="open.zoom_image" @click.self="closezoom">
    <img :src="'files/'+img.photo" alt="" width="500px" height="500px">
</div> --}}
