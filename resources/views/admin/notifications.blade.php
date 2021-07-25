@extends('admin.layout')
@section('title')
    الإشعارات
@endsection
@section('content')
    <!-- Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- breadcrumbs -->
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="active">
                        الإشعارات
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header">الإشعارات</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        كل الإشعارات
                        <div class="pull-left">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    {{ count($notifications) }} الإشعارات
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>المحتوي</th>
                                        <th>التذكرة</th>
                                        <th>الوقت</th>
                                        <th>المشاهدة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($notifications as $notf)
                                    <tr class="odd gradeX">
                                        <td>{{$notf->id}}</td>
                                        <td>{{$notf->user->name}}</td>
                                        <td>{{$notf->content}}</td>
                                        <td>
                                            <a href="{{route('tickets.view',$notf->tickt_id)}}"
                                                class="btn btn-info btn-sm" role="button"> عرض
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                        </td>
                                        <td>{{$notf->created_at->diffForHumans()}}</td>
                                        <td class="conts">
                                            @if($notf->seen==1)
                                            تمت المشاهدة
                                            <i class="fa fa-check"></i>
                                            @else
                                                تعيين كمقروءة
                                                <a href="{{route('notifications.read',$notf->id)}}"
                                                    role="button" title="تعيين كمقروءة "
                                                    class="btn btn-primary btn-xs pull-left">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </a>
                                             @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->
    <!-- /Content -->
@endsection

