<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
      <div class="row-fluid">
      <form action="login" method="POST"  class="form-signin">
        <h4>Favor, ingrese sus datos</h4><hr />
        
        @if(Session::has('message'))
            <div class="alert alert-error">
              <strong>{{ Session::get('message') }}</strong>
            </div> 
        @endif  
        
        <input name="email" type="text" class="input-block-level" placeholder="Email">
        <input name="password" type="password" class="input-block-level" placeholder="Password">
        <br /><br />
        <div class="text-center">
          <button class="btn btn-success" type="submit">Iniciar Sesión</button>
        </div>
      </form>
    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>