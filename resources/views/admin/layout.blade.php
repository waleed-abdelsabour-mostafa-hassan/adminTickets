<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <!--------- Title --------->
        <title>
            لوحة التحكم
            |
            @yield('title')
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
        <!-- Sweet Alert -->
        <link rel="stylesheet" href="{{asset('sweetalert2/dist/sweetalert2.min.css')}}" />
        <script src="{{asset('sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('sweetalert2/dist/sweetalert2.min.js')}}"></script>
        <!-- Select2  -->
        <link rel="stylesheet" href="{{asset('select2/dist/css/select2.min.css')}}" />
        <!-- DataTables CSS -->
        <link  rel="stylesheet" href="{{asset('css/adm/plugins/dataTables.bootstrap.css')}}">
        <!-- Custom CSS -->
        <link  rel="stylesheet" href="{{asset('css/adm/rtl/sb-admin-2.css')}}"/>
        <!-- Morris Charts CSS -->
        <link  rel="stylesheet" href="{{asset('css/adm/plugins/morris.css')}}"/>
        <!-- Custom Fonts -->
        <link  rel="stylesheet" href="{{asset('css/adm/font-awesome/font-awesome.min.css')}}"/>
        <!-- Custom Css -->
        <link  rel="stylesheet" href="{{asset('css/adm/admin.css')}}"/>
        <!-- Font Cairo -->
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <style>
            body,*{
                font-family: 'Cairo', serif;
            }
        </style>
        <!-- Styles -->
        @yield('style')
        <!-- /Styles -->
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('home')}}">{{Auth::user()->name}}</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i>
                            @if(Auth::user()->notifications->where('seen',0)->count() > 0)
                                <i class="fa fa-circle fa-fw" style="color: red"></i>
                            @endif
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li class="text-center">
                                لديك {{Auth::user()->notifications->where('seen',0)->count()}} رسائل غير مقروءة
                                <hr>
                            </li>
                            @foreach(Auth::user()->notifications->where('seen',0) as $notf)
                                <li>
                                    <a href="{{route('tickets.view',$notf->tickt_id)}}">
                                        <div>
                                        <span class="pull-left text-muted">
                                            <em>{{$notf->created_at->diffForHumans()}}</em>
                                        </span>
                                            <strong>{{$notf->reactor->name}}</strong>
                                        </div>
                                        <div>{{$notf->content}}
                                            <a href="{{route('notifications.read',$notf->id)}}" class="pull-left"
                                                title="تعيين كمقروءة">
                                                <span class="fa fa-check-circle-o"></span>
                                            </a>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                            <hr>
                            <li>
                                <a class="text-center" href="{{route('notifications')}}">
                                    <strong>عرض كل الإشعارات</strong>
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i>
                                    تسجيل خروج
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}"
                                      method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation" >
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="ابحث...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a class="active" href="{{route('home')}}"><i class="fa fa-dashboard fa-fw"></i> الرئيسية </a>
                            </li>
                            @if(Auth::user()->isAdmin())
                                <li>
                                    <a href="#"><i class="fa fa-user"></i>
                                        المشرفين
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{route('supervisors.create')}}">إضافة مشرف</a>
                                        </li>
                                        <li>
                                            <a href="{{route('supervisors')}}">عرض الكل</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li>
                                <a href="#"><i class="fa fa-user"></i>
                                    التذاكر
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('tickets.create')}}">إضافة تذكرة</a>
                                    </li>
                                    <li>
                                        <a href="{{route('tickets')}}">عرض الكل</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <!--Flash Message-->
            @include('admin.flashmessage')
            <!-- /Flash Message -->
            <!-- Content -->
            @yield('content')
            <!-- /Content -->
        </div>
        <!-- /#wrapper -->
        <!-- jQuery Version 1.11.0 -->
        <script type="text/javascript" src="{{asset('js/adm/jquery-1.11.0.js')}}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="{{asset('js/adm/bootstrap.min.js')}}"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script type="text/javascript" src="{{asset('js/adm/metisMenu/metisMenu.min.js')}}"></script>
        <!-- Morris Charts JavaScript -->
        <script type="text/javascript" src="{{asset('js/adm/raphael/raphael.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/adm/morris/morris.min.js')}}"></script>
        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="{{asset('js/adm/sb-admin-2.js')}}"></script>
        <!-- DataTables JavaScript -->
        <script type="text/javascript" src="{{asset('js/adm/jquery/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/adm/bootstrap/dataTables.bootstrap.min.js')}}"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <!-- Select 2 -->
        <script type="text/javascript" src="{{asset('select2/dist/js/select2.min.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
        <!-- Delete  -->
        <script>
            $("[data-delete]").on('click',function(e){
                var url=$(this).data('delete');
                Swal.fire({
                    title:"هل أنت متأكد ؟",
                    text:"لن تتمكن من التراجع عن هذا!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText:"نعم ، احذفها!",
                    cancelButtonText:"تراجع"
                }).then(function(e){
                    if(e.value == true){
                        window.location.href = url;
                    }
                });
            });
        </script>
        <!-- Js -->
        @yield('js')
        <!-- Js -->
    </body>
</html>
