@extends('admin.layout')
@section('title')
    {{ __('pages.main.Supervisors') }}
@endsection
@section('content')
    <!-- Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- breadcrumbs -->
                <ol class="breadcrumb" style="background-color: #fff">
                    <li>
                        <a href="{{ url('home') }}">{{ __('pages.main.home') }}</a>
                    </li>
                    <li class="active">
                        المشرفين
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header">{{ __('pages.main.Supervisors') }}
                    <a href="{{route('supervisors.create')}}" class="btn btn-success pull-left" role="button">
                    {{ __('pages.main.AddNew') }} <i class="fa fa-plus"></i>
                    </a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    {{ __('pages.main.Supervisors') }}
                        <div class="pull-left">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    {{ count($users) }}  {{ __('pages.main.Supervisor') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            @if ($users->count() == 0)
                                <div class="alert alert-info">
                                    <h2 class="text-center">{{ __('pages.main.No_Supervisors_added Until Now') }}</h2>
                                </div>
                            @else
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('pages.main.Completed_Name') }}</th>
                                            <th>{{ __('pages.form.mobile') }}</th>
                                            <th>{{ __('pages.form.email') }}</th>
                                            <th> {{ __('pages.main.ticket_OwnerName') }}</th>
                                            <th> {{ __('pages.main.ticket_AssignedName') }}</th>
                                            <th style="width: 150px">{{ __('pages.main.Choises') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr class="odd gradeX">
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->ownerTickets->count()}}</td>
                                                <td>{{$user->assignedTickets->count()}}</td>
                                                <td class="actions">
                                                    <a href="{{route('supervisors.edit',$user->id)}}"
                                                        class="btn btn-warning btn-sm" role="button"> {{ __('pages.main.Update') }}
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm" role="button"
                                                        data-delete="{{route('supervisors.delete',$user->id)}}"> {{ __('pages.main.Delete') }}
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
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
