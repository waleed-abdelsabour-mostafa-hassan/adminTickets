<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--------- Title --------->
        <title>
            تسجيل الدخول
        </title>
        <!--link rel="shortcut icon" href="asset('images/'.\App\Setting::settings('icon'))}}"-->
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{asset('css/adm/rtl/bootstrap.min.css')}}"/>
        <!-- not use this in ltr -->
        <link  rel="stylesheet" href="{{asset('css/adm/rtl/bootstrap.rtl.css')}}"/>
        <!-- MetisMenu CSS -->
        <link  rel="stylesheet" href="{{asset('css/adm/plugins/metisMenu/metisMenu.min.css')}}"/>
        <!-- Timeline CSS -->
        <link  rel="stylesheet" href="{{asset('css/adm/plugins/timeline.css')}}"/>
        <!-- DataTables CSS -->
        <link  rel="stylesheet" href="{{asset('css/adm/plugins/dataTables.bootstrap.css')}}">
        <!-- Custom CSS -->
        <link  rel="stylesheet" href="{{asset('css/adm/rtl/sb-admin-2.css')}}"/>
        <!-- Morris Charts CSS -->
        <link  rel="stylesheet" href="{{asset('css/adm/plugins/morris.css')}}"/>
        <!-- Custom Fonts -->
        <link  rel="stylesheet" href="{{asset('css/adm/font-awesome/font-awesome.min.css')}}"/>
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <style>
            body , *{
                font-family: 'Cairo', serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">سجل دخولك الآن</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{ route('login') }}">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="البريد الالكتروني ...">
                                       @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control  @error('password')
                                        is-invalid @enderror " id="pass" placeholder="ادخل كلمة المرور ..." required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" style="margin-right: -20px;"
                                                value="Remember Me">تذكرني
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="دخول">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery Version 1.11.0 -->
        <script type="text/javascript" src="{{asset('js/adm/jquery-1.11.0.js')}}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="{{asset('js/adm/bootstrap.min.js')}}"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script type="text/javascript" src="{{asset('js/adm/metisMenu/metisMenu.min.js')}}"></script>
        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="{{asset('js/adm/sb-admin-2.js')}}"></script>
    </body>
</html>
