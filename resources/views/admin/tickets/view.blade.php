@extends('admin.layout')
@section('title')
      {{$ticket->title}}
@endsection
@section('content')
    <!-- Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- breadcrumbs -->
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">{{ __('pages.main.home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('tickets') }}">{{ __('pages.main.tickets') }}</a>
                    </li>
                    <li class="active">
                    {{ __('pages.main.Show_ticket') }}
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header">{{$ticket->title}}</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-sm-8">
                <div>
                    <h2 class="alert alert-info">{{ __('pages.main.Data') }}</h2>
                    <table class="table table-striped table-bordered text-center">
                        <tr>
                            <th> {{ __('pages.main.ticket_id') }}</th>
                            <td>{{$ticket->id}}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pages.main.Description') }}</th>
                            <td>{{$ticket->description}}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pages.main.ticket_OwnerName') }}</th>
                            <td>{{$ticket->owner->name}}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pages.main.ticket_AssignedName') }}</th>
                            <td>{{$ticket->assigned->name}}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pages.main.Status') }}</th>
                            <td><span class="badge badge-info">{{$ticket->status()}}</span></td>
                        </tr>
                        <tr>
                            <th>{{ __('pages.main.From_Date') }}</th>
                            <td>{{$ticket->from_date}}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pages.main.To_Date') }}</th>
                            <td>{{$ticket->to_date}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->
    <!-- /Content -->
@endsection
