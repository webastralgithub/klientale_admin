@extends('frontend.layouts.app')

@section('content')

<style>
    .container {
        background-color: #fff;
        border-radius: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 510px;
        margin-top: 110px;
    }

    .hide {
        display: none;
    }

    .container p {
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 0.3px;
        margin: 20px 0;
    }

    .container span {
        font-size: 12px;
    }

    .container a {
        color: #333;
        font-size: 13px;
        text-decoration: none;
        margin: 15px 0 10px;
    }

    .container button {
        background-color: #0d60ab;
        color: #fff;
        font-size: 12px;
        padding: 10px 45px;
        border: 1px solid transparent;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-top: 10px;
        cursor: pointer;
    }

    .container button.hidden {
        background-color: transparent;
        border-color: #fff;
    }

    .container form {
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        height: 100%;
    }

    .container input {
        background-color: #eee;
        border: none;
        margin: 6px 0;
        padding: 8px 15px;
        font-size: 12px;
        border-radius: 8px;
        width: 100%;
        outline: none;
    }

    .container select{
        background-color: #eee;
        border: none;
        margin: 8px 0;
        padding: 10px 15px;
        font-size: 13px;
        border-radius: 8px;
        width: 100%;
        outline: none;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .container.active .sign-in {
        transform: translateX(100%);
    }

    .sign-up {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
        transition: all 0.5s;
    }

    .container.active .sign-up {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: move 0.6s;
    }

    @keyframes move {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .social-icons {
        margin: 20px 0;
    }

    .alert.alert-success {
        width: auto;
        margin: 0 auto;
        max-width: 600px;
        text-align: center;
        position: absolute;
        right: 0;
        top: 93px;
        left: 0;
        color: green;
        /* Set color to green */
    }

    .alert.alert-danger {
        width: auto;
        margin: 0 auto;
        max-width: 600px;
        text-align: center;
        position: absolute;
        right: 0;
        top: 93px;
        left: 0;
        background: red;
        color: white;
        /* Set color to white */
    }

    .social-icons a {
        border: 1px solid #ccc;
        border-radius: 20%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 3px;
        width: 40px;
        height: 40px;
        transition: all 0.5s;
    }

    .social-icons a:hover {
        scale: 1.3;
        border: 1px solid #000;
    }

    .toggle-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: all 0.6s ease-in-out;
        border-radius: 150px 0 0 100px;
        z-index: 99;
    }

    .container.active .toggle-container {
        transform: translateX(-100%);
        border-radius: 0 150px 100px 0;
    }

    .toggle {
        background-color: #0d60ab;
        height: 100%;
        background: linear-gradient(to right, #297cc7, #0d60ab);
        color: #fff;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: all 0.6s ease-in-out;
    }

    .container.active .toggle {
        transform: translateX(50%);
    }

    .toggle-panel {
        position: absolute;
        width: 50%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 30px;
        text-align: center;
        top: 0;
        transform: translateX(0);
        transition: all 0.6s ease-in-out;
    }

    .toggle-left {
        transform: translateX(-200%);
    }

    .container.active .toggle-left {
        transform: translateX(0);
    }

    .toggle-right {
        right: 0;
        transform: translateX(0);
    }

    .container.active .toggle-right {
        transform: translateX(200%);
    }

    .radio-btns-sec {
        display: flex;
        margin-top: 10px;
        width: 100%;
        column-gap: 10px;
        align-items: center;
    }

    .radio-btns-sec h6 {
        width: 100%;
        font-size: 14px;
        margin: 0;
    }

    .radio-btns-sec span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .radio-btns-sec.klientale-user-type {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: space-between;
    }

    .radio-btns-sec.klientale-user-type span {
        width: 45%;
    }

    .radio-btns-sec.klientale-user-type span input {
        width: 20px;
        height: 20px;
    }

    
    @media screen and (max-width: 600px) {
        .container {
            width: 93%;
            min-height: 84vh;
            margin-top: 100px;
            z-index: 9;
        }

        .sign-in,
        .sign-up {
            width: 100%;
            height: 60%;
            top: 40%;
        }

        .toggle-panel {
            width: 100%;
        }

        .toggle-container {
            left: 0%;
            width: 100%;
            border-radius: 0px !important;
        }

        .toggle {
            left: 0%;
            width: 100%;
            height: 40%;
        }

        .container.active .sign-up {
            transform: translateX(0%);
        }

        .container.active .toggle-container {
            transform: translateX(0%);
        }

        .container.active .toggle {
            transform: translateX(0%);
        }
    }

    .error-message {
        background: red;
    }

    .success-message {
        background: green;
    }

    .form-floating {
        width: 100%;
    }

    input#exampleCheck1\  {
        width: auto;
        margin: 3px 6px 3px 3px;
    }
    button#signup-btn {
        padding: 10px 0px !important;
    }

    @media (max-width:600px){
        form#signup-form .container input {
            margin: 4px 0;
        }

        .toggle-container {
            height: 30%;
        }

        .toggle {
            height: 100%;
        }

        .sign-in, .sign-up {
            width: 100%;
            height: 80%;
            top: 35%;
            overflow: auto;
        }

        .radio-btns-sec {
            flex-wrap: wrap;
        }

        .radio-btns-sec h6 {
            margin-bottom: 10px;
        }

        .container {
            overflow: auto;
        }


    }




    /* General Form Styling */
    #signup-form {
        font-family: Arial, sans-serif;
        max-width: 400px;
        margin: auto;
    }

    input {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Icon Styling */
    .info-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .icon {
        width: 16px;
        height: 16px;
        fill: #007BFF;
    }

    /* Tooltip Styling */
    .input-group {
        position: relative;
    }

    .tooltip {
        position: absolute;
        bottom: 125%; /* Position above the input */
        right: 0;
        background-color: #fff;
        color: #333;
        border-radius: 8px;
        padding: 10px;
        font-size: 0.875rem;
        line-height: 1.4;
        text-align: left;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        z-index: 10;
        white-space: nowrap;
        width: 100%;
        border: 1px solid #dddddd;
    }
    .tooltip p{
        white-space: break-spaces;
        width: 100%;
        margin: 0;
        word-wrap: break-word;
        word-break: break-all;
        display: flex;
        position: relative;
        font-size: 11px;
        color: red;
    }
    /* Tooltip Arrow */
    .tooltip-arrow {
        position: absolute;
        bottom: -6px;
        left: 50%;
        transform: translateX(-50%);
        width: 10px;
        height: 10px;
        background-color: #fff;
        transform: rotate(45deg);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Show Tooltip on Hover */
    .info-icon:hover + .tooltip,
    .tooltip:hover {
        visibility: visible;
        opacity: 1;
    }

</style>
<div class="container" id="container">
    <div id="errorMessageContainer" class="sw-message error-message" style="display: none;"></div>
    <div id="successMessageContainer" class="sw-message success-message" style="display: none;"></div>
    @if(session('verified'))
    <div class="alert alert-success verify-now-div" id="verified-message"> <img src="{{asset('frontend/img/check.png')}}" alt=""> You are now verified. Please login. <div class="btm-div-line"><a href="https://crm.klientale.com/">Click here to Login</a></div>
    </div>
    @endif
    <div class="form-container sign-up hide">

        <form id="loginForm">
            <h1>Sign In</h1>
            <input type="email" id="log-email" placeholder="Email">
            <input type="password" id="log-password" placeholder="Password">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forget Your Password? </a>
            @endif
            <!-- <button type="button" id="signInBtn">Sign In</button> -->
            <button type="button" id="signInBtn"><i class="fa fa-spinner fa-spin" id="loginSpinnerIcon" style="display:none;"></i>Sign In</button>
        </form>

    </div>
    <div class="form-container sign-in hide">
        <form id="signup-form">
            <h1>Create Account</h1>
            {{--<input type="text" name="username" id="name" placeholder="User Name">--}}
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="text" id="phone" name="phone" placeholder="Phone">
            <input type="text" id="business_name" name="business_name" placeholder="Business name">
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password">
                <span class="info-icon" id="passwordInfo">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="icon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m0-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
            </svg>
        </span>
                <div id="tooltip" class="tooltip">
                    <div class="tooltip-arrow"></div>
                    <p>Password should be  English uppercase characters (A – Z) English lowercase characters (a – z) Base 10 digits (0 – 9) Non-alphanumeric (For example: !, $, #,@ or %) Unicode characters</p>
                </div>
            </div>
            {{--<input type="password" id="password" name="password" placeholder="Password">--}}
            <input type="password" id="password" name="password_confirmation" placeholder="Password Confirmation">
            <select name="category_id" id="category_id">
                <option value="">Select a Profession</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="radio-btns-sec klientale-user-type">
                <h6>Select one of these</h6>
                <span>
                    <input id="consumer" name="user_type" type="radio" value="consumer" checked>
                    <label for="consumer">Consumer</label>
                </span>

                <span>
                    <input id="business" name="user_type" type="radio" value="business">
                    <label for="business">Business</label>
                </span>
            </div>

            <input type="hidden" id="user_role" name="user_role"> <!-- Hidden input for user role -->

            <button type="button" id="signup-btn" class="btn btn-primary py-3 w-100"><i class="fa fa-spinner fa-spin" id="spinnerIcon" style="display:none;"></i> {{ __('SIGN UP') }}</button>
        </form>

    </div>
    <div class="toggle-container hide">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1 style="color: #fff;">Welcome Back!</h1>
                <p style="color: #fff;">Enter your personal details to use all of site features</p>
               <a href="https://crm.klientale.com/"> <button class="hidden" id="login">Sign In</button></a>
            </div>
            <div class="toggle-panel toggle-right">
                <h1 style="color: #fff;">Hello, Friend!</h1>
                <p style="color: #fff;">Register with your personal details to use all of site features</p>
                <a href="https://crm.klientale.com/"> <button class="hidden" id="login">Sign In</button></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");

    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $('#successMessageContainer').hide();
    $('#errorMessageContainer').hide();

    $("#signInBtn").click(function() {
        var email = $("#log-email").val();
        var password = $("#log-password").val();
        var remember = $("#exampleCheck1").val();

        $('#loginSpinnerIcon').show();

        $.ajax({
            type: "POST",
            url: "{{route('login.post')}}",
            data: {
                email: email,
                password: password,
                remember: remember
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                if (response.status) {
                    $('#successMessageContainer').text(response.message).show();
                    setTimeout(function() {
                        $('#successMessageContainer').hide();
                    }, 2000);

                    window.location.href = response.redirect;
                } else {
                    var errorMessage = "";
                    $.each(response.errors, function(key, value) {
                        errorMessage += value + "</br>";
                    });
                    $('#errorMessageContainer').html(errorMessage).show();
                    setTimeout(function() {
                        $('#errorMessageContainer').hide();
                    }, 2000);
                }
            },
            error: function(response) {
                response = response.responseJSON;
                var errorMessage = "";
                $.each(response.errors, function(key, value) {
                    errorMessage += value + "</br>";
                });
                $('#errorMessageContainer').html(errorMessage).show();
                setTimeout(function() {
                    $('#errorMessageContainer').hide();
                }, 2000);
            },
            complete: function() {
                $('#loginSpinnerIcon').hide();
            }
        });
    });
});

</script>
<script>
    $(document).ready(function() {
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        $('#successMessageContainer').hide();
        $('#errorMessageContainer').hide();

        $("#signup-btn").on("click", function() {
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var password = $("#password").val();
            var business_name = $("#business_name").val();
            var userType = $("input[name='user_type']:checked").val();
            $("#user_role").val(userType);

            $('#spinnerIcon').show();

            $.ajax({
                type: "POST",
                url: "{{route('login.register')}}",
                data: $("#signup-form").serialize(),
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    if (response.status) {
                        $("#signup-form")[0].reset();
                        $('#successMessageContainer').text(response.message).show();
                        // setTimeout(function() {
                        //     $('#successMessageContainer').hide();
                        // }, 2000);

                        // window.location.href = response.redirect;
                    } else {

                        var errorMessage = "";
                        $.each(response.errors, function(key, value) {
                            errorMessage += value + "</br>";
                        });
                        $('#errorMessageContainer').html(errorMessage).show();
                        setTimeout(function() {
                            $('#errorMessageContainer').hide();
                        }, 2000);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        console.log('hererere')
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = "";
                        $.each(errors, function(key, value) {
                            errorMessage += value + "<br>";
                        });
                        $('#errorMessageContainer').show();
                        $('#errorMessageContainer').html(errorMessage).show();
                    }

                    setTimeout(function() {
                        $('#errorMessageContainer').hide();
                    }, 3000);
                },
                complete: function() {
                    $('#spinnerIcon').hide();
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        @if(session('verified'))
        $('.message-success').removeClass('hide');
        const verifyMessage = $('#verified-message');
        $('#container').append(verifyMessage);
        setTimeout(function() {
          window.location.href="https://crm.klientale.com/"
        }, 5000);
        @else
        $('.form-container').removeClass('hide');
        $('.toggle-container').removeClass('hide');
        @endif
    });

</script>


<script>
    function showMessage(success, message) {
        var messageDiv = document.getElementById("message");
        messageDiv.innerHTML = message;
        messageDiv.style.color = success ? "green" : "red";
    }
</script>

@endsection