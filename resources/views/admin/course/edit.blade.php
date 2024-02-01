@extends('admin.layout.layout')
@section('title')
Edit Course
@endsection
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <a>{{ $title ?? 'Edit Course' }}</a>
            </h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! html()->form('POST', route('course.update', $course))->attribute('enctype', 'multipart/form-data')->open() !!}
            @csrf
            {!! html()->hidden('_method', 'PUT') !!}

            <div class="row">
                <!-- Course Name Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Course Name')->for('course_name') !!}
                        {!! html()->text('course_name')->class('form-control')->value(old('course_name', $course->course_name))->placeholder('Course Name') !!}
                    </div>
                </div>

                <!-- Department Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Department')->for('dept_id') !!}
                        {!! html()->select('dept_id', $departments, old('dept_id', $course->dept_id))->class('form-control')->placeholder('Select Department') !!}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {!! html()->button('Update Course', 'submit')->class('btn btn-success') !!}
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
