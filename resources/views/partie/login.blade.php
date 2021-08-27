<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">


<div class="card-header">
    <h3>تسجيل الدخول</h3>
    <div class="social_icon">
        <span><i class="fab fa-facebook-square"></i></span>
        <span><i class="fab fa-google-plus-square"></i></span>
    </div>
</div>
<div class="card-body">
    <form>
        <div class="otm-input-group">
            <span class="otm-input-icon">
                <i class="fas fa-user"></i>
            </span>
            <input type="text" class="otm-text-input" placeholder="اسم االمستخدم">
        </div>
        <div class="otm-input-group">
            <span class="otm-input-icon">
                <i class="fas fa-key"></i>
            </span>
            <input type="password" class="otm-text-input" placeholder="كلمة المرور">
        </div>
        <div class="otm-input-checkbox">
            <input type="checkbox">
            <span>
                تذكرني
            </span>
        </div>

        <button type="submit" value="تسجيل" class="otm-login-btn">تسجيل</button>

    </form>
</div>
<div class="otm-card-links">
    <div>
        <a href="#">لقد نسيت كلمة المرور ؟ </a>
    </div>
</div>
