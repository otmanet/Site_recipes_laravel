<!DOCTYPE html>
<html dir="rtl">
<title>حلويات سيدتي</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/css/first_page.css">

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div
            style="height: 85px;width: 100%;display: flex;justify-content: space-between;background: #fff;border-bottom: 1px solid #f0f0f0;">

            <!-- Right-sided navbar links. Hide them on small screens -->
            <div>
                <div class="logo">

                    <a href="/" style="display: flex;align-items: center;">
                        <img src="assets/img/logo.jpg" height="66px">
                        <div>

                            <p style=" font-size: 25px;color: #14bf96;font-size: 30px;">
                                حلويات سيدتي
                            </p>
                        </div>
                    </a>
                </div>
                @if (Route::has('login'))
                <div style=" position: absolute; top: 0;left:0;margin-top: 28px;justify-content: space-around.
                ......................................................................">
                    @auth
                    <a href="{{ url('/home') }}" style="font-size: 20px;color: #14bf96; margin-left: 10px">الصفحة
                        الرئيسية</a>
                    @else

                    <a href="{{ route('login') }}" style="font-size: 20px;color: #14bf96; margin-left: 10px"><i
                            class="fas fa-sign-out-alt fa-rotate-180 " style="margin-left: 8px"></i>تسجيل
                        الدخول </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="font-size: 20px;color: #14bf96;margin-left: 7px"><i
                            class="fas fa-sign-out-alt fa-rotate-180" style="margin-left: 8px"></i>فتح حساب</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
        <div class="w3-display-bottomleft w3-padding-large w3-opacity">

        </div>
    </header>

    <!-- Page content -->
    <div class="w3-content" style="max-width:1100px">

        <!-- About Section -->
        <div class="w3-row w3-padding-64" id="about">
            <div class="w3-col m6 w3-padding-large w3-hide-small">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active" style="margin-top: 35px">
                            <img src="assets/img/recipe_1.jpg" class="w3-round w3-image w3-opacity-min"
                                alt="Table Setting" width="600" height="750">
                        </div>
                        <div class="item" style="margin-top: 35px">
                            <img src="assets/img/recipe_2.jpg" class="w3-round w3-image w3-opacity-min"
                                alt="Table Setting" width="600" height="750">
                        </div>
                        <div class="item" style="margin-top: 35px">
                            <img src="assets/img/recipe_3.jpg" class="w3-round w3-image w3-opacity-min"
                                alt="Table Setting" width="600" height="750">
                        </div>
                        <div class="item" style="margin-top: 35px">
                            <img src="assets/img/recipe_4.jpg" class="w3-round w3-image w3-opacity-min"
                                alt="Table Setting" width="600" height="750">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-col m6 w3-padding-large">
                <h1 class="w3-center">لك سيدتي</h1><br>
                <h5 class="w3-center" style="font-size: 25px">استمتعت</h5>
                <p style="font-size: 30px">تأليف المطبخ هو وضع شخصيتك في ما تفعله وهذا الشعور يجعله
                    مختلفًا.<br><br>
                    سر النجاح في الحياة هو أن تأكل ما تحب وتدع الطعام يقاتل من الداخل. <br><br>
                    اكتشاف طبق جديد هو أكثر فائدة للبشرية من اكتشاف النجم.
                </p>
                <p style="font-size: 30px">لا ينبغي قياس متعة الولائم من
                    خلال وفرة الأطعمة
                    الشهية ،
                    بل بجمع الأصدقاء ومحادثاتهم.</p>
            </div>
        </div>

        <!-- End page content -->
    </div>

    <!-- Footer -->
    <footer class="w3-center w3-light-grey w3-padding-32" style="position: fixed; bottom:0; right: 0;left: 0;">
        <div class="top-slide-item">

            <a href="" style="margin-right:5px ">
                <span><i class="fab fa-facebook-f"></i><span>
            </a>
            <a href="">
                <span> <i class="fab fa-instagram"></i></span>
            </a>
            <a href="">
                <span> <i class="fab fa-youtube"></i></span>
            </a>
        </div>
    </footer>

</body>
<script src="https://kit.fontawesome.com/9099f81dc0.js" crossorigin="anonymous"></script>

</html>
