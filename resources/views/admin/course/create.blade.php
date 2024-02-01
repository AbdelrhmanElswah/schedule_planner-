@extends('admin.layout.layout')
@section('title')
Create Course
@endsection
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <div class="">
                    <a>{{ !empty($title) ? $title : 'Create Course' }}</a>
                </div>
            </h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! html()->form('POST', url('admin/course'))->open() !!}
            @csrf

            <div class="row">
                <!-- Course Name Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Course Name')->for('course_name') !!}
                        {!! html()->text('course_name')->class('form-control')->value(old('course_name'))->placeholder('Course Name') !!}
                    </div>
                </div>
                <div>
</div>
                <!-- Department Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Department')->for('dept_id') !!}
                        {!! html()->select('dept_id', $departments, old('dept_id'))->class('form-control')->placeholder('Select Department') !!}

                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="card-footer">
                {!! html()->button('Add Course', 'submit')->class('btn btn-success') !!}
            </div>

            {!! html()->form()->close() !!}
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // JavaScript for initializing any required plugins, like datepicker or select2
        });
    </script>
@endpush
