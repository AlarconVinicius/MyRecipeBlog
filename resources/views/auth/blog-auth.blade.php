@extends('main_layouts.master-auth')

@section('title', 'Login')
@section('content')

@section("style")
@endsection
<?php $route = Route::current()->getName(); ?>
<!-- Sign In Section Begin -->
<div class="signin">
    <div class="signin__warp">
        <div class="signin__content">
            <div class="signin__form pt-2">
            <div class="signin__logo">
                <a href="#"><img src="{{ asset('img/logos/Ideia_3-remove-bg-cut.png') }}" alt=""></a>
            </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="signin__form__text">
                                {{-- <p>with your social network :</p>
                                <div class="signin__form__signup__social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google"></i></a>
                                </div>
                                <div class="divide">or</div> --}}
                                <form method="POST" action="{{ route('auth.login') }}" autocomplete="off">
                                    @csrf
                                    <input type="text" name="email" placeholder="User Name*">
                                    <input type="password" name="password" placeholder="Password">
                                    <button type="submit" class="site-btn">Entrar</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Sign In Section End -->

@endsection

@section("script")
@endsection