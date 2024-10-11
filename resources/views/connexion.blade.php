<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SONOU - DASHBOARD</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-lcs.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,500i,600,600i,700,700i,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="{{ asset('assets/css/OcOrato---Login-form-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/OcOrato---Login-form.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/untitled-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/untitled.css') }}">
</head>

<body style="background-image: url(&quot;../assets/img/18706084_rm222-mind-31.jpg&quot;);font-family: Nunito, sans-serif;">
    <form id="form" class="user" style="font-family: Quicksand, sans-serif;background-color: #ffffff;width: 700px;padding: 40px;margin-top: 5%;" action="{{ route('connexion') }}" method="POST">
        @csrf
        <h2 id="head" style="color: rgb(42,19,186);font-weight: bold;font-family: Poppins, sans-serif;">Se Connecter</h2>
        <div></div>
        <div class="form-group" style="margin-top: 20%;">
            <input class="form-control form-control-user" name="email" type="email" style="background-color: rgb(241,241,241);color: rgb(0,0,0);" placeholder="Nom d'utilisateur" required>
        </div>
        <div class="form-group">
            <input class="form-control form-control-user" name="password" type="password" style="background-color: rgb(242,242,242);color: rgb(0,0,0);" placeholder="Mot de passe" required>
        </div>
        <div class="form-group">
            <div class="form-check text-center">
                <input class="form-check-input" type="checkbox" id="formCheck-1">
                <label class="form-check-label" for="formCheck-1" style="color: rgb(0,0,0);font-family: Nunito, sans-serif;font-weight: bold;">Se souvenir de moi</label>
            </div>
        </div>
        <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-weight: bold;font-family: Nunito, sans-serif;background-color: rgb(71,26,145);">Se Connecter</button>
        <a id="linkas" style="font-size: 12px;margin: auto;margin-left: 0;margin-right: 0;margin-bottom: 0;margin-top: 5%;padding-left: 0;padding-right: 0;color: rgb(28,57,159);font-family: Nunito, sans-serif;font-weight: bold;" href="#">Mot de passe oublié</a>
    </form>
    
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-charts.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
</body>

</html>
