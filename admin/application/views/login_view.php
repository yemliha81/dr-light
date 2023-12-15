<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>YÖNETİCİ GİRİŞİ</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo FATHER_BASE;?>template/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo FATHER_BASE;?>template/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo FATHER_BASE;?>template/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo FATHER_BASE;?>template/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Lütfen Giriş Yapınız</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" action='<?php echo LOGIN_POST?>'>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Kullanıcı adı" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Şifreniz" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type='submit' class='btn btn-info' value='GİRİŞ YAP'> 
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo FATHER_BASE;?>template/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo FATHER_BASE;?>template/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo FATHER_BASE;?>template/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo FATHER_BASE;?>template/js/startmin.js"></script>

    </body>
</html>
