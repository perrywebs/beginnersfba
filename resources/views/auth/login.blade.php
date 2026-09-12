<html>

<head>
  <meta charset="UTF-8">
  <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title> </title>
  <meta name="description"
    content="BeginnersFba &amp; eCommerce Management. Serving US, UK, EU clients. We help you sell on Amazon, Etsy and Shopify high ticket dropshipping stores.">
  <link rel="stylesheet" href="{{asset('homeAssets/ajax/libs/font-awesome/6.1.0/css/all.min.css')}}"
    integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
  <link href="homeAssets/npm/bootstrap%405.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="homeAssets/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link href="{{asset('homeAssets/images/favicon.png')}}" rel="shortcut icon"
    type="image/x-icon">
  <style>
    @import url("css2");

    * {
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    .flex-r,
    .flex-c {
      justify-content: center;
      align-items: center;
      display: flex;
    }

    .flex-c {
      flex-direction: column;
    }

    .flex-r {
      flex-direction: row;
    }

    .container {
      width: 100%;
      min-height: 100vh;
      padding: 20px 10px;
      background: #e5e5e5;
    }

    .login-text {
      background-color: #f6f6f6;
      max-width: 100%;
      min-height: 500px;
      border-radius: 10px;
      padding: 10px 20px;
    }

    .logo {
      margin-bottom: 20px;
    }

    .logo span,
    .logo span i {
      font-size: 25px;
      color: #0d8aa7;
    }

    .login-text h1 {
      font-size: 25px;
    }

    .login-text p {
      font-size: 15px;
      color: #000000b2;
    }

    form {
      align-items: flex-start !important;
      width: 100%;
      margin-top: 15px;
    }

    .input-box {
      margin: 10px 0px;
      width: 100%;
    }

    .label {
      font-size: 15px;
      color: black;
      margin-bottom: 3px;
    }

    .input {
      background-color: #f6f6f6;
      padding: 0px 5px;
      border: 2px solid rgba(216, 216, 216, 1);
      border-radius: 10px;
      overflow: hidden;
      justify-content: flex-start;
    }

    input {
      border: none;
      outline: none;
      padding: 10px 5px;
      background-color: #f6f6f6;
      flex: 1;
    }

    .input i {
      color: rgba(0, 0, 0, 0.4);
    }

    .check span {
      color: #000000b2;
      font-size: 15px;
      font-weight: bold;
      margin-left: 5px;
    }

    .btn {
      color: #ffffff;
      border-radius: 30px;
      padding: 10px 15px;
      background: linear-gradient(122.33deg, #68bed1 30.62%, #1e94e9 100%);
      margin-top: 30px;
      margin-bottom: 10px;
      font-size: 16px;
      transition: all 0.3s linear;
    }

    .btn:hover {
      transform: translateY(-2px);
    }

    .extra-line {
      font-size: 15px;
      font-weight: 600;
    }

    .extra-line a {
      color: #0095b6;
    }
  </style>
</head>


<body>
  <div class=" flex-r container">
    <div class="flex-r login-wrapper">
      <div class="login-text">
        <div class="logo">
          <a href="/">
            <img src="{{asset('homeAssets/images/logo.png')}}" style="width:250px">
          </a>

          <div>
            <style>
              #google_translate_element {

                color: transparent;
              }

              #google_translate_element a {

                display: none;
              }

              select.google_translate_element {

                color: black;
              }

              div.goog-te-gadget {

                color: transparent;
              }

              div.goog-te-gadget {

                color: transparent !important;
              }

              .goog-te-gadget .goog-te-combo {

                margin: 0px 0 !important;
                padding: 0px 10px;
                font-size: 15px;
                font-weight: 500;
                background: rgba(0, 0, 0, 0.9);
                background-size: 300% 100%;
                border: 1px solid #fff;
                color: #52afee !important;
                border-radius: 5px;
                cursor: pointer;
                outline: none;
                font-family: 'Poppins', sans-serif;
                border-radius: 5px;
                box-shadow: 0px 3px 5px #fff;
                height: 30px;
                display: inline-block;
                position: relative;
                /* top: 6px; */
                width: 100px;
              }
            </style>
            <script type="text/javascript">
              function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
            </script>
            <script type="text/javascript" src="homeAssets/translate_a/element.js?cb=googleTranslateElementInit">
            </script>
            <div id="google_translate_element"></div>
          </div>
        </div>
        <h1>Login</h1>
        <p>
          <x-error-message textColor="text-danger" />
        </p>

        {{-- this login is no longer in use but it works perfectly --}}
        {{--<livewire:auth.login /> --}} 
        <div>
          <form class="flex-c" method="POST" action="{{ route('post.login') }}">
            @csrf
            <div class="input-box">
              <span class="label">E-mail</span>
              <div class=" flex-r input">
                <input type="text" placeholder="name@abc.com" name='email' required>
                <i class="fas fa-at"></i>
              </div>
            </div>

            <div class="input-box">
              <span class="label">Password</span>
              <div class="flex-r input">
                <input type="password" placeholder="" name='password' required>
                <i class="fas fa-lock"></i>
              </div>
            </div>

            <button class="btn" type="submit">
              Login
            </button>

          </form>
          <span class="extra-line">
            <span>Book Now</span>
            <a href="/booking">Sign up</a>
          </span>
        </div>
      </div>
    </div>
  </div>
  {{-- <script src="//code.jivosite.com/widget/NInO2bgwq9" async></script> --}}
</body>

</html>