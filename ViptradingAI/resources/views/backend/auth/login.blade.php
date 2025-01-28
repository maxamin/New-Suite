<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--Head-->
@include('backend.include.__head')
<!--/Head-->
<body>

    <video autoplay muted loop id="bg-video">
        <source src="/assets/backend/materials/prodax.mp4" type="video/mp4">
        Tarayıcınız video etiketini desteklemiyor.
    </video>
    
    <style>
    
#bg-video {
    position: fixed; 
    top: 0;
    left: 0;
    min-width: 100%; 
    min-height: 100%;
    z-index: -1; /* Diğer içeriklerin üzerine eklemek için */
}
.admin-auth {
    background: none;
}
/* Form Container */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Form Element Style */
.single-box {
    margin-bottom: 15px;
}

.box-input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    background: none;
    border: 3px solid #3d03fc;
    border-radius: 5px;
    font-size: 16px;
}

.single-box {
    width: 100%;
}

/* Button Style */
.site-btn {
    background: none;
    width: 100%;
    color: #fff;
    border: 3px solid #3d03fc;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Hafif bir gölge efekti */
}

.site-btn:hover {
    background-color: #3d03fc; /* Hover durumunda renk değişimi */
}
    </style>

<!--Auth Page-->
<div class="admin-auth">
    
@section('title')
    {{ __('Login') }}
@endsection
@section('auth-content')
    <div>
        <div class="login-content">
            <div class="auth-body">

                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="single-box">
                        <input
                            type="email"
                            name="email"
                            class="box-input"
                            placeholder="Admin Email"
                            required
                        />
                    </div>
                    <div class="single-box">
                        <input
                            type="password"
                            name="password"
                            class="box-input"
                            placeholder="Password"
                            required
                        />
                    </div>
                    <div class="single-box">
                        <button class="site-btn" type="submit">{{ __('Admin Login') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
    
    <x:notify-messages/>
    @yield('auth-content')
</div>
<!--/Auth Page-->

<!--Script-->
@include('backend.include.__script')
<!--/Script-->

</body>
</html>







