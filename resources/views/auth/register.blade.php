@extends('layouts.app')

@section('content')
<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
        <div class="w3-col m6 w3-padding-large w3-hide-small">
            <div style="width: 600px;">
                <div class="card" style="height: 450px">
                    <div class="card-header">
                        <p style="font-size: 25px;color: #14bf96 ;float: right;">{{ __('فتح حساب') }}</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                    <p style="font-size: 25px;color:#14bf96">{{ __('اسم') }}</p>
                                </label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        style="border-radius: 1.5rem;width: 350px;height: 40px;font-size: 25px">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"
                                        style="font-size: 25px;text-align: right">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                    <p style="font-size: 25px;color:#14bf96">{{ __('بريد الكتروني') }}</p>
                                </label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        style="border-radius: 1.5rem;width: 350px;height: 40px;font-size: 25px">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"
                                        style="font-size: 25px;text-align: right">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    <p style="font-size: 25px;color:#14bf96">{{ __('كلمة المرور') }}</p>
                                </label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password"
                                        style="border-radius: 1.5rem;width: 350px;height: 40px;font-size: 25px">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"
                                        style="font-size: 25px;text-align: right">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                    <p style="font-size: 25px;color:#14bf96">{{ __('تأكيد كلمة المرور') }}</p>
                                </label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        style="border-radius: 1.5rem;width: 350px;height: 40px;font-size: 25px">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="otm-login-btn">
                                        {{ __('فتح') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="w3-col m6 w3-padding-large">
            <h1 class="w3-center">لك سيدتي</h1><br>
            <h5 class="w3-center" style="font-size: 25px">استمتعت</h5>
            <p style="font-size: 30px;text-align: right">تأليف المطبخ هو وضع شخصيتك في ما تفعله وهذا الشعور يجعله
                مختلفًا.<br><br>
                سر النجاح في الحياة هو أن تأكل ما تحب وتدع الطعام يقاتل من الداخل. <br><br>
                اكتشاف طبق جديد هو أكثر فائدة للبشرية من اكتشاف النجم.
            </p>
            <p style="font-size: 30px;text-align: right">لا ينبغي قياس متعة الولائم من
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

@endsection
