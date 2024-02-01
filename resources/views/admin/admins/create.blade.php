@extends('admin.layout.layout')

@section('content')
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">
                    <div class="">
                        <a>{{ !empty($title) ? $title : '' }}</a>
                    </div>
                </h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                {!! html()->form('POST', url('admin/admins'))->open() !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! html()->label('Name')->for('name') !!}
                            {!! html()->text('name')->class('form-control')->value(old('name'))->placeholder('Name') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! html()->label('Email')->for('email') !!}
                            {!! html()->email('email')->class('form-control')->value(old('email'))->placeholder('Email') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! html()->label(trans('Password'))->for('password') !!}
                            {!! html()->password('password')->class('form-control')->placeholder('Password') !!}
                        </div>
                    </div>



                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                {!! html()->button('Add Admin', 'submit')->class('btn btn-success') !!}
            </div>

            {!! html()->form()->close() !!}
        </div>

@endsection

@push('scripts')
    <script>
        // Here you can add your JavaScript code to initialize plugins like Select2
        // and handle any custom dynamic form behavior.
        $(document).ready(function () {
            // Initialize any JS plugins you need for the form, like a datepicker or select2
        });
    </script>
@endpush
