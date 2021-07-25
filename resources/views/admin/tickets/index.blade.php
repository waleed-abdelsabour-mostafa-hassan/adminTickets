@extends('admin.layout')
@section('title')
{{ __('pages.main.tickets') }}
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
                    {{ __('pages.main.tickets') }}
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header">{{ __('pages.main.tickets') }}
                    <a href="{{route('tickets.create')}}" class="btn btn-success pull-left" role="button">
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
                    {{ __('pages.main.ownerTickets_added') }}
                        <div class="pull-left">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    {{ count($ownTickets) }}  {{ __('pages.main.ticket') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            @if ($ownTickets->count() == 0)
                                <div class="alert alert-info">
                                    <h2 class="text-center">{{ __('pages.main.No_OwnTickets_added Until Now') }}</h2>
                                </div>
                            @else
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>{{ __('pages.main.ticket_id') }}</th>
                                            <th>{{ __('pages.main.Address') }}</th>
                                            <th>{{ __('pages.main.Status') }}</th>
                                            <th> {{ __('pages.main.ticket_AssignedName') }}</th>
                                            <th> {{ __('pages.main.From_Date') }}</th>
                                            <th> {{ __('pages.main.To_Date') }}</th>
                                            <th style="width: 150px">{{ __('pages.main.Choises') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ownTickets as $ticket)
                                            <tr class="odd gradeX">
                                                <td>{{$ticket->id}}</td>
                                                <td>{{$ticket->title}}</td>
                                                <td><span class="badge badge-info">{{$ticket->status()}}</span></td>
                                                <td>{{$ticket->assigned->name}}</td>
                                                <td>{{$ticket->from_date}}</td>
                                                <td>{{$ticket->to_date}}</td>
                                                <td class="actions">
                                                    <a href="{{route('tickets.view',$ticket->id)}}"
                                                    class="btn btn-info btn-sm" role="button"> {{ __('pages.main.Show') }}
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{route('tickets.edit',$ticket->id)}}"
                                                        class="btn btn-warning btn-sm" role="button"> {{ __('pages.main.Update') }}
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    <a href="#" class="btn btn-danger btn-sm" role="button"
                                                    data-delete="{{route('tickets.delete',$ticket->id)}}"> {{ __('pages.main.Delete') }}
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


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    {{ __('pages.main.assignTickets_added') }}
                        <div class="pull-left">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    {{ count($assignTickets) }}  {{ __('pages.main.ticket') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            @if ($assignTickets->count() == 0)
                                <div class="alert alert-info">
                                    <h2 class="text-center">{{ __('pages.main.No_assignTickets_added Until Now') }}</h2>
                                </div>
                            @else
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>{{ __('pages.main.ticket_id') }}</th>
                                            <th>{{ __('pages.main.Address') }}</th>
                                            <th>{{ __('pages.main.Status') }}</th>
                                            <th> {{ __('pages.main.ticket_OwnerName') }}</th>
                                            <th> {{ __('pages.main.From_Date') }}</th>
                                            <th> {{ __('pages.main.To_Date') }}</th>
                                            <th style="width: 150px">{{ __('pages.main.Choises') }}</th>
                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($assignTickets as $ticket)
                                            <tr class="odd gradeX">
                                                <td>{{$ticket->id}}</td>
                                                <td>{{$ticket->title}}</td>
                                                <td><span class="badge badge-info">{{$ticket->status()}}</span></td>
                                                <td>{{$ticket->owner->name}}</td>
                                                <td>{{$ticket->from_date}}</td>
                                                <td>{{$ticket->to_date}}</td>
                                                <td class="actions">
                                                    <a href="{{route('tickets.view',$ticket->id)}}"
                                                        class="btn btn-info btn-sm" role="button"> عرض
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    @if ($ticket->status == 0)
                                                        <a href="{{route('tickets.open',$ticket->id)}}"
                                                            class="btn btn-success btn-sm" role="button"> {{ __('pages.main.Open') }}
                                                        </a>
                                                    @endif
                                                    @if ($ticket->status == 1 || $ticket->status == 3)
                                                        <a href="{{route('tickets.close',$ticket->id)}}"
                                                            class="btn btn-danger btn-sm" role="button"> {{ __('pages.main.Close') }}
                                                        </a>
                                                    @endif
                                                    @if ($ticket->status == 2)
                                                        <a href="{{route('tickets.reopen',$ticket->id)}}"
                                                            class="btn btn-primary btn-sm" role="button"> {{ __('pages.main.ReOpen') }}
                                                        </a>
                                                    @endif
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
@section('js')
    <script>
        $("[data-fresh]").on('click',function(e){
            e.preventDefault();
            var url=$(this).data('fresh');
            var codo=$(this).closest('td').children('input');
            /***/
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: {{ __('pages.main.update_code_message') }},
                        showConfirmButton: false,
                        timer: 1500
                    })
                    codo.val(data.code);
                }
            })
        });
    </script>
@endsection
