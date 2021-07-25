@extends('admin.layout')
@section('title')
    {{ __('pages.main.Add_ticket') }}
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
                    {{ __('pages.main.Add_ticket') }}
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header"> {{ __('pages.main.Add_ticket') }}</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-xs-8">
                <form action="{{route('tickets.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-xs-4 labelo"> {{ __('pages.main.Address') }} :</label>
                        <input class="form-control col-xs-8 input-lg createpro"
                            name="title" placeholder=" العنوان ..." value="{{old('title')}}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 labelo"> {{ __('pages.main.Description') }} :</label>
                        <textarea class="form-control col-xs-8 input-lg createpro" rows="5" name="description" placeholder=" التفاصيل ...">{{old('description')}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 labelo">{{ __('pages.main.From_Date') }} :</label>
                        <input class="form-control col-xs-8 input-lg createpro" type="date"
                            name="from_date" value="{{old('from_date')}}">
                        @error('from_date')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 labelo">{{ __('pages.main.To_Date') }} :</label>
                        <input class="form-control col-xs-8 input-lg createpro" type="date"
                            name="to_date" value="{{old('to_date')}}">
                        @error('to_date')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 labelo">{{ __('pages.main.ticket_AssignedName') }}  :</label>
                        <select class="form-control col-xs-8 input-lg createpro selecton"
                                name="assigned_id" required>
                            <option value="">-- {{ __('pages.main.Choose_Admin') }}--</option>
                            @foreach(App\User::where([['type','admin'],['id','!=',Auth::user()->id]])->get() as $user)
                                <option value="{{ $user->id }}" {{(old('assigned_id')== $user->id)? 'selected':''}}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="col-xs-6 btn btn-info btn-lg sumpo"> {{ __('pages.main.Save') }}  <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->
    <!-- /Content -->
@endsection

