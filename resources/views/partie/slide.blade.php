<div class="new-slide-bar ">
    <div class="top-nav-p">
        <p>مرحبا بك سيدتي في مطبخكي</p>
    </div>
    <ul style="width:100%;height: 100%;" id="hamnull">

        <li v-for="type in types">
            <a class="active" @click.prevent="show(type)">
                <span class="title">
                    <p class="p_slide">
                        @{{type.id}} @{{type.name_ar}}
                    </p>
                </span>
            </a>
        </li>
    </ul>
    <div class="top-slide-item">
        <a href="https://www.facebook.com/profile.php?id=100009301717423" target="_blank">
            <span><i class="fab fa-facebook-f"></i><span>
        </a>
        <a href="">
            <span> <i class="fab fa-instagram"></i></span>
        </a>
        <a href="">
            <span> <i class="fab fa-youtube"></i></span>
        </a>
    </div>

</div>
