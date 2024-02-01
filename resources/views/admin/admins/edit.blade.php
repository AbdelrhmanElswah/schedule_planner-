@extends('admin.layout.layout')

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <div class="">
                    <a>{{ $title }}</a>
                    <!-- Dropdown menu and other header elements... -->
                </div>
            </h3>
            <!-- Card tools... -->
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! html()->form('POST', url('admin/admins/'.$admin->id))->open() !!}
            {!! html()->hidden('_method', 'PUT') !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Name')->for('name') !!}
                        {!! html()->text('name')
                            ->class('form-control')
                            ->value(old('name', $admin->name))
                            ->placeholder('Name') !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Email')->for('email') !!}
                        {!! html()->email('email')
                            ->class('form-control')
                            ->value(old('email', $admin->email))
                            ->placeholder('Email') !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Password')->for('password') !!}
                        {!! html()->password('password')
                            ->class('form-control')
                            ->placeholder('New Password') !!}
                    </div>
                </div>

                <!-- Include other fields as necessary -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {!! html()->button('Update', 'submit')->class('btn btn-success') !!}
        </div>

        {!! html()->form()->close() !!}
    </div>
@endsection

@push('scripts')
    <script>
        // JavaScript code for initializing plugins
        $(document).ready(function () {
            // Initialization code for any JS plugins needed in the form
        });
    </script>
@endpush
