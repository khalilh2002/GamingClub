<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://kit.fontawesome.com/2c68a7a0e8.js" crossorigin="anonymous"></script>
    <style>
        body {
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }
        .form-control {
            height: 41px;
            background: #f2f2f2;
            box-shadow: none !important;
            border: none;
        }
        .form-control:focus {
            background: #e2e2e2;
        }
        .form-control, .btn {
            border-radius: 3px;
        }
        .signup-form {
            width: 390px;
            margin: 30px auto;
        }
        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .signup-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .signup-form hr {
            margin: 0 -30px 20px;
        }    
        .signup-form .form-group {
            margin-bottom: 20px;
        }
        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }
        .signup-form .row div:first-child {
            padding-right: 10px;
        }
        .signup-form .row div:last-child {
            padding-left: 10px;
        }
        .signup-form .btn {        
            font-size: 16px;
            font-weight: bold;
            background: #3598dc;
            border: none;
            min-width: 140px;
        }
        .signup-form .btn:hover, .signup-form .btn:focus {
            background: #2389cd !important;
            outline: none;
        }
        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }
        .signup-form a:hover {
            text-decoration: none;
        }
        .signup-form form a {
            color: #3598dc;
            text-decoration: none;
        }   
        .signup-form form a:hover {
            text-decoration: underline;
        }
        .signup-form .hint-text {
            padding-bottom: 15px;
            text-align: center;
        }
        #background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("./css/LogoFull.jpg");
            background-repeat: no-repeat;
            background-position: top;
            background-size: cover;
            filter: blur(5px);
            z-index: -1;
        }
        #home-button {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
            z-index: 9999;
            font-size: 26px;
        }
        #home-button .fa-door-closed {
            color: #037ffc;
        }
        #home-button:hover .fa-door-closed {
            color: gray;
        }
        #email-error {
            display: none;
        }
    </style>
</head>
<body>
    <div id="background"></div>
    <a href="./index.php" id="home-button">
        <i class="fas fa-door-closed"></i>
    </a>
    <div class="signup-form">
        <form id="registration-form" method="post" action="./verfier.php">
            <h2>Sign Up</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required="required">
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required">
                    </div>
                </div>            
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>        
            <div class="form-group">
                <div class="hint-text">Already have an account? <a href="./login.php">Login here</a></div>
            </div>
            <div class="form-group">
                <input type="hidden" name="data_type" value="register">
                <button type="submit" class="btn btn-primary btn-lg" name="submit" id="submitBtn">Sign Up</button>
            </div>
            <div id="email-error" class="alert alert-danger" style="display: none;">Invalid Email Format</div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#registration-form').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting

                var email = $('#email').val();
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (emailPattern.test(email)) {
                    // If email format is valid, submit the form
                    $('#registration-form').unbind('submit').submit();
                } else {
                    // If email format is invalid, show the error message
                    $('#email-error').show();
                }
            });
        });
    </script>
</body>
</html>
