<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/app.css">
    <title>Dashboard</title>
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/createrecipe.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/editrecipe.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/show.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashnavbar.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- script -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/9099f81dc0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="assets/js/slide.js"></script>
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">

    <!--------- add input---------------------->
    <script src="/wp-includes/js/addInput.js" language="Javascript" type="text/javascript"></script>
    <script>
        var counter = 1;
        var limit = 15;

        function addInput(divName) {
            if (counter == limit) {
                alert("You have reached the limit of adding " + counter + " inputs");
            } else {
                var newdiv = document.createElement('div');
                newdiv.innerHTML =
                    "<div  id='remove'> <input  type='text' class='form-control' placeholder='أضف مكوناتك...'   name='desc_integeredients[]'  multiple> <a onClick='remove()'  style='color:black'><i class='fas fa-trash'></i></a></div> ";
                document.getElementById(divName).appendChild(newdiv);
                counter++;
            }
        }

        function remove() {
            var R = document.getElementById("remove");
            R.remove();

        }

    </script>
    <script>
        var counter = 1;
            var limit = 120;

            function addInput2(divName) {
                if (counter == limit) {
                    alert("You have reached the limit of adding " + counter + " inputs");
                } else {
                    var newdiv = document.createElement('div');
                    newdiv.innerHTML =
                        "<div  id='remove'> <input  type='text' class='form-control' placeholder='أضف خطوات ...'   name='desc_steps[]'  multiple> <a onClick='remove()'  style='color:black'><i class='fas fa-trash'></i></a></div> ";
                    document.getElementById(divName).appendChild(newdiv);
                    counter++;
                }
            }

            function remove() {
                var R = document.getElementById("remove");
                R.remove();

            }

    </script>
    <script>
        $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap");

        body {
            font-family: "Amiri", serif;

            background-color: #14bf96;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Amiri", serif
        }

        .w3-bar-block .w3-bar-item {
            padding: 20px
        }

        .logo p {
            color: #14bf96;
            font-size: 30px;
            font-family: "Amiri", serif;
        }
    </style>
</head>


<body>
    <!-- Top menu -->
    <div class="w3-top" style="z-index: 5">
        <div class="w3-white w3-xlarge" style="max-width:100%;margin:auto">
            <div class="w3-button w3-padding-16 w3-right" id="ham">☰</div>
            <div class="w3-left w3-padding-16">
                <div
                    class="absolute flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                    @if (Route::has('login'))
                    <div>
                        @auth
                        <a href="{{ route('logout') }}"
                            style="font-size: 25px;color: #14bf96;margin-bottom: 18px ;margin-left: 10px"
                            onclick="event.preventDefault();
                                                                                                             document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-rotate-180"></i> {{ __('تسجيل خروج') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        @else

                        <a href="{{ route('login') }}" style="font-size: 20px;color: #14bf96; margin-left: 10px">تسجيل
                            الدخول </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            style="font-size: 20px;color: #14bf96;margin-left: 7px">تسجيل</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
            <div class="w3-center w3-padding-16">
                <a class="logo" href="/home">
                    <div>
                        <p>
                            <img src="assets/img/logo.jpg" height="66px">
                            حلويات سيدتي
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- <div>
        @include('recipes.dashtopnavbar')
    </div>
    <div>
        @include('recipes.slidebardashboard')
    </div> --}}

    <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px;" id="I">
        <div class="row">
            <div class="row2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dbox dbox--color-1">
                                <div class="dbox__icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="dbox__body">
                                    <span class="dbox__count">@{{userCount}}</span>
                                    <span class="dbox__title">المستخدمين</span>
                                </div>
                                <div class="dbox__action">
                                    <button class="dbox__action__btn" @click.prevent="openTableUser">مزيد من المعلومات
                                        ...</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dbox dbox--color-2">
                                <div class="dbox__icon">
                                    <i class="fas fa-pizza-slice"></i>
                                </div>
                                <div class="dbox__body">
                                    <span class="dbox__count">@{{recipeCount}}</span>
                                    <span class="dbox__title">وصفات</span>
                                </div>
                                <div class="dbox__action">
                                    <button @click.prevent="openTableRecipe" class="dbox__action__btn">مزيد من المعلومات
                                        ...</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dbox dbox--color-3">
                                <div class="dbox__icon">
                                    <i class="fas fa-carrot"></i>
                                </div>
                                <div class="dbox__body">
                                    <span class="dbox__count">3,782</span>
                                    <span class="dbox__title">وصفات من قبل المستخدم</span>
                                </div>
                                <div class="dbox__action">
                                    <button class="dbox__action__btn">مزيد من المعلومات ...</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dbox dbox--color-1">
                                <div class="dbox__icon">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <div class="dbox__body">
                                    <span class="dbox__count">@{{typeCount}}</span>
                                    <span class="dbox__title">أنواع الوصفات</span>
                                </div>
                                <div class="dbox__action">
                                    <button @click.prevent="openTableType" class="dbox__action__btn">مزيد من المعلومات
                                        ...</button>
                                </div>
                            </div>
                        </div>
                        <!-- Table with panel -->
                        <div class="card card-cascade narrower" style="width: 100%; margin-top:10px;">
                            <!--Card image-->
                            <div
                                class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                                <a href="" class="white-text mx-3">وصفات المائدة</a>

                                <div>
                                    <button @click.prevent="openIndex"
                                        style="width: 200px;height: 60px;border:0;border-radius: 1000px" type="button">
                                        أضف الوصفات<i class="el-icon-circle-plus"></i>
                                    </button>
                                    <button @click.prevent="opentyperecipe"
                                        style="width: 200px;height: 60px;border:0;border-radius: 1000px" type="button">
                                        أضف نوع الوصفة<i class="el-icon-circle-plus"></i>
                                    </button>
                                </div>
                                <div class="search">
                                    <input type="text" name="" id="myInput" class="search_input"
                                        placeholder="ابحث هنا...">
                                    <a href="#" class="search_icon"><i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            <!--Table-->
                            <div style="overflow:auto;height:700px;">
                                <table class="table table-bordered table-striped mb-0" v-if="open.tableRecipe">
                                    <!--Table head-->
                                    <thead>
                                        <tr>
                                            <th class="th-lg">
                                                <div class="td-h">رقم الوصفة</div>
                                            </th>
                                            <th class="th-lg">
                                                <div class="td-h">اسم الوصفة</div>
                                            </th>
                                            <th class="th-lg">
                                                <div class="td-h">وصف الوصفة</div>
                                            </th>
                                            <th>
                                                <div class="td-h">نوع الوصفة</div>
                                            </th>
                                            <th class="th-lg">
                                            </th>
                                            <th class="th-lg">
                                            </th>
                                        </tr>
                                    </thead>
                                    <!--Table head-->
                                    <!--Table body-->
                                    <tbody class=" tbody" id="myTable" v-for="recipe,index in recipes">
                                        <tr>
                                            <td>
                                                <div class="td-p">@{{ index+1 }}</div>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="td-p">@{{ recipe.recipe_name }}</p>
                                                </div>
                                            </td>
                                            <td class="size">
                                                <div>
                                                    <p class="td-p">@{{ recipe.recipe_description }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <p class="td-p">@{{ recipe.name_ar}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="button-show">
                                                    <a @click.prevent="showRecipe(recipe)"><i
                                                            class="el-icon-circle-plus"></i>
                                                        أكثر...</a>
                                                </div>
                                            </td>
                                            <td>
                                                <button @click.prevent="openEdit(recipe)" type="button"
                                                    class="btn btn-outline-white btn-rounded btn-sm px-2">
                                                    <i class="fas fa-pencil-alt mt-0"></i>
                                                    <button @click.prevent="deleteRecipe(recipe)" type="button"
                                                        class="btn btn-outline-white btn-rounded btn-sm px-2">
                                                        <i class="far fa-trash-alt mt-0"></i>
                                                    </button>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--Table body-->
                                </table>
                                <table class="table table-bordered table-striped mb-0" v-if="open.tableUser">
                                    <!--Table head-->
                                    @include('recipes.tableUser')
                                    <!--Table body-->
                                </table>
                                <table class="table table-bordered table-striped mb-0" v-if="open.tableType">
                                    <!--Table head-->
                                    @include('recipes.tableType')
                                    <!--Table body-->
                                </table>
                                <!--Table-->
                            </div>

                        </div>
                        <!-- Table with panel -->
                    </div>
                </div>
                <div class="popup" v-if="open.popup" @click.self="closePopup(recipe)">
                    <div class="index" v-if="open.index">
                        @include('recipes.createrecipe')
                    </div>
                    <div class="image-row" v-if="open.image">
                        @include('recipes.show')
                    </div>
                    <div class="index" v-if="open.editUser">
                        @include('recipes.EditUser')
                    </div>
                    <div class="index" v-if="open.typerecipe">
                        @include('recipes.TypeRecipe')
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>


    <script src="{{ mix('js/app.js') }}"></script>

</body>
{{-- <script src="assets/js/vue.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="assets/js/index.js"></script>
<script>
    Vue.use(VeeValidate);
</script>

<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>




</html>
