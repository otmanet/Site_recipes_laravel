<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>حلويات سيدتي</title>
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <!-- import JavaScript -->
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/sass/thumbnails.css">
    <link rel="stylesheet" href="assets/sass/book.css">
    <link rel="stylesheet" href="assets/css/heart.css">
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <link rel="stylesheet" href="assets/css/recipes.css">
    <link rel="stylesheet" href="assets/css/carousel.css">
    <link rel="stylesheet" href="assets/css/slide.css">
    {{-- carousel --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/mega-menu.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/image_recipe.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<style>
    .content14 {
        height: 400px;
        width: 750px;
        overflow: hidden;
        box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.4);
    }

    .content14 .images {
        height: 100%;
        width: 100%;
    }

    .images img {
        height: 100%;
        width: 100%;
    }
</style>

<body>

    <!-- Sidebar (hidden by default) -->
    {{-- <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-right"
        style="display:none;z-index:20;width:40%;min-width:300px" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
        <a href="#food" class="w3-bar-item w3-button">Food</a>
        <a href="#about" class="w3-bar-item w3-button">About</a>
    </nav> --}}

    <!-- Top menu -->
    <div id="T">
        <div class="w3-top" style="z-index: 5">
            <div class="w3-white w3-xlarge" style="max-width:100%;margin:auto">
                <div class="w3-button w3-padding-16 w3-right" id="ham">☰</div>
                <div class="w3-left w3-padding-16" style="margin-top: 12px">
                    <div
                        class="absolute flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                        @if (Route::has('login'))
                        <div>
                            @auth
                            <a href="{{ route('logout') }}"
                                style="font-size: 25px;color: #14bf96;margin-bottom: 18px ;margin-left: 10px"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-rotate-180"></i> {{ __('تسجيل خروج') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @else
                            <a href="{{ route('login') }}"
                                style="font-size: 20px;color: #14bf96; margin-left: 10px">تسجيل
                                الدخول </a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                style="font-size: 20px;color: #14bf96;margin-left: 7px">تسجيل</a>
                            @endif
                            @endauth

                        </div>
                        @endif
                        <div class="Hotbg">
                            <input type="text" v-model="search" class="Hotbg-txt" placeholder="بحث >>>" name="search">
                            <a @click.prevent="SearchRecipe(search)" class="Hotbg-btn">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
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


        @include('partie.slide')

        <!-- !PAGE CONTENT! -->
        <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px;">
            {{-- <ul v-for="type in types">
                <li>
                    <button @click.prevent="show(type)">@{{type.name_ar}}</button>
            </li>
            </ul> --}}
            <!-- First Photo Grid-->

            <div class="w3-row-padding w3-padding-16 w3-center" v-if="open.showsearch">
                <div class="row">
                    @include('partie.search')
                </div>
            </div>
            <div class="w3-row-padding w3-padding-16 w3-center" v-if="open.showtype">
                <div class="row">
                    @include('partie.content3')
                </div>
            </div>
            <div class="w3-row-padding w3-padding-16 w3-center" v-if="open.inf_recipe">
                <div class="content2">
                    @include('partie.content2')
                </div>
            </div>
            <div class="w3-row-padding w3-padding-16 w3-center" v-if="open.content">
                <div class="row">
                    <div style="992px" v-for="urecipe in user_recipes">
                        <div style="float: right;margin-left: 20px;height: 100%;">
                            <div class="card text-white  flex-md-row mb-4 shadow-sm h-md-250"
                                style="background-color: #14bf96">
                                <div class="wrapper-content">
                                    <div class="content14" style="width: 200px; height: 250px">
                                        <div class="images" v-for="img in urecipe.image_recipe"
                                            style="width: 200px; height: 250px">
                                            <img class="card-img-right flex-auto d-none d-lg-block"
                                                alt="Thumbnail [200x250]" :src="'files/'+img.photo"
                                                style="width: 200px; height: 250px">
                                        </div>
                                    </div>
                                </div>
                                {{-- <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]"
                                :src="'files/'+img.photo" style="width: 200px; height: 250px"> --}}
                                <div class="card-body d-flex flex-column align-items-start">
                                    <strong class="d-inline-block mb-2 text-white">
                                        <p style="font-size: 23px;color:#fff;justify-content: space-between">
                                            @{{urecipe.recipe_name.substring(0,15)+".."}} :</p>
                                    </strong>
                                    {{-- <h6 class="mb-0">
                                    <a class="text-white" href="#">Food for Thought: Diet and Brain Health</a>
                                </h6> --}}
                                    <div>
                                        <p>@{{urecipe.created_at.substring(0,10)}}</p>
                                    </div>

                                    <div style="width:300px;height: 80px;">
                                        <p style="text-align: right;text-overflow: ellipsis;">

                                            @{{urecipe.recipe_description.substring(0,100)+".."}}
                                        </p>

                                    </div>

                                    <a class="btn btn-outline-info"
                                        style="position: absolute;bottom:0;margin-bottom: 5px;left:10px;border-color: white;"
                                        @click.prevent="showrecipe(urecipe)">
                                        انقر هنا
                                        للمزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <!-- Second Photo Grid-->
            <div class="w3-row-padding w3-padding-16 w3-center">
                <div class="w3-quarter">
                    <img src="/w3images/popsicle.jpg" alt="Popsicle" style="width:100%">
                    <h3>All I Need Is a Popsicle</h3>
                    <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
                </div>
                <div class="w3-quarter">
                    <img src="/w3images/salmon.jpg" alt="Salmon" style="width:100%">
                    <h3>Salmon For Your Skin</h3>
                    <p>Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.
                    </p>
                </div>
                <div class="w3-quarter">
                    <img src="/w3images/sandwich.jpg" alt="Sandwich" style="width:100%">
                    <h3>The Perfect Sandwich, A Real Classic</h3>
                    <p>Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.</p>
                </div>
                <div class="w3-quarter">
                    <img src="/w3images/croissant.jpg" alt="Croissant" style="width:100%">
                    <h3>Le French</h3>
                    <p>Lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
                </div>
            </div> --}}
            <!-- Pagination -->
            {{-- <div class="w3-center w3-padding-32">
            <div class="w3-bar">
                <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
                <a href="#" class="w3-bar-item w3-black w3-button">1</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
            </div>
        </div> --}}

            <hr id="about">
            <!-- About Section -->
            <div class="w3-container w3-padding-32 w3-center">
                <h3 style="font-size:25px;color:#14bf96">عني ، المرأة الغذائية</h3><br>
                <div class="w3-padding-32">
                    <h4 style="font-size: 25px"><b>أنا من أنا!</b></h4>
                    <h6 style="font-size: 22px"><i>بشغف للحصول على طعام جيد حقيقي</i></h6>
                    <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an
                        interest
                        of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt
                        sed
                        tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam
                        non
                        fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus
                        vitae,
                        ultricies congue gravida diam non fringilla.</p>
                </div>
            </div>
            <hr>

            <!-- Footer -->
            {{-- <footer class="w3-row-padding w3-padding-32">
                <div class="w3-third">
                    <h3>FOOTER</h3>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies
                        congue gravida diam non fringilla.</p>
                    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
                </div>

                <div class="w3-third">
                    <h3>BLOG POSTS</h3>
                    <ul class="w3-ul w3-hoverable">
                        <li class="w3-padding-16">
                            <img src="/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
                            <span class="w3-large">Lorem</span><br>
                            <span>Sed mattis nunc</span>
                        </li>
                        <li class="w3-padding-16">
                            <img src="/w3images/gondol.jpg" class="w3-left w3-margin-right" style="width:50px">
                            <span class="w3-large">Ipsum</span><br>
                            <span>Praes tinci sed</span>
                        </li>
                    </ul>
                </div>

                <div class="w3-third w3-serif">
                    <h3>POPULAR TAGS</h3>
                    <p>
                        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
                    </p>
                </div>
            </footer> --}}
            <!-- End page content -->
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/9099f81dc0.js" crossorigin="anonymous"></script>
    <script src="assets/js/slide.js"></script>
    <script src="assets/js/carousel.js"></script>
    {{-- <script src="assets/js/vue.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    {{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="assets/js/user.js"></script>
    <!-- import JavaScript -->
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="assets/js/image_recipe.js"></script>
</body>

</html>
