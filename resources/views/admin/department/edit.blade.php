@extends('admin.layout.layout')
@section('title')
Edit Department
@endsection
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <a>{{ $title ?? 'Edit User' }}</a>
            </h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! html()->form('POST', url('admin/department/'.$department->dept_id))->attribute('enctype', 'multipart/form-data')->open() !!}
            @csrf
            {!! html()->hidden('_method', 'PUT') !!}

            <div class="row">
                <!-- Name Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Department')->for('department_name') !!}
                        {!! html()->text('department_name')->class('form-control')->value($department->department_name)->placeholder('Department') !!}
                    </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {!! html()->button('Update Department', 'submit')->class('btn btn-success') !!}
        </div>

        {!! html()->form()->close() !!}
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // JavaScript for initializing any required plugins, like datepicker or select2
        });
    </script>
@endpush
