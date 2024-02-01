@extends('admin.layout.layout')

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <a>{{ !empty($title) ? $title : 'Admin Details' }}</a>
            </h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <b>ID :</b> {{$admin->id}}
                </div>
                <div class="clearfix"></div>
                <hr />
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <b>Name :</b>
                    {!! $admin->name !!}
                </div>
                <div class="col-md-6 col-lg-6 col-xs-6">
                    <b>Email :</b>
                    {!! $admin->email !!}
                </div>

                <!-- Include other fields here if needed -->

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        </div>
    </div>
@endsection
