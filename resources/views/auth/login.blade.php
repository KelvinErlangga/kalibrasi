@extends('auth.auth')

@section('content')
<div id="login-box" class="login-box visible widget-box no-border">
    <div class="widget-body">
        <div class="widget-main no-border">
            <h4 class="header blue lighter bigger">
                Insert Your Data
            </h4>

            <div class="space-6"></div>

            <form role="form" method="POST" action="{{ url('/auth/login') }}">
                @csrf
                <fieldset  class="no-border" >
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" placeholder="Nama" name="nama"
                                value="{{ old('nama') }}" />
                            <i class="ace-icon fa fa-envelope"></i>
                        </span>
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </label>

                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                            <i class="ace-icon fa fa-lock"></i>
                        </span>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </label>

                    <div class="space"></div>

                    <div class="clearfix">
                        

                        <button type="submit" class="pull-left btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-key"></i>
                            <span class="bigger-110">Login</span>
                        </button>
                    </div>

                    <div class="space-4"></div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection