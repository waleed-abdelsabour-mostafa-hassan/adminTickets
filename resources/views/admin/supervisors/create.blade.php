@extends('admin.layout')
@section('title')
    {{ __('pages.main.Add_supervisor') }}
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
                        <a href="{{ route('supervisors') }}">{{ __('pages.main.Supervisors') }}</a>
                    </li>
                    <li class="active">
                    {{ __('pages.main.Add_supervisor') }}
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header"> {{ __('pages.main.Add_supervisor') }}</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-xs-8">
                <form action="{{route('supervisors.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-xs-4 labelo"> {{ __('pages.main.Completed_Name') }} :</label>
                        <input class="form-control col-xs-8 input-lg createpro"
                            name="name" placeholder=" الإسم ..." value="{{old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 labelo"> {{ __('pages.main.mobile') }}  :</label>
                        <input class="form-control col-xs-8 input-lg createpro"
                            name="phone" placeholder="الهاتف  ..." value="{{old('phone')}}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 labelo"> {{ __('pages.main.email') }}:</label>
                        <input class="form-control col-xs-8 input-lg createpro" type="email"
                            name="email" placeholder=" البريد ..." value="{{old('email')}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 labelo">{{ __('pages.main.password') }}  :</label>
                        <input class="form-control col-xs-8 input-lg createpro" type="password"
                            name="password" placeholder="كلمة المرور  ...">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 labelo">{{ __('pages.main.password_confirmation') }}  :</label>
                        <input class="form-control col-xs-8 input-lg createpro" type="password"
                            name="password_confirmation" placeholder="أكد كلمة المرور  ...">
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
