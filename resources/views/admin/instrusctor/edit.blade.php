@extends('admin.layout.layout')
@section('title')
Edit Instructor
@endsection
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <a>{{ $title ?? 'Edit Instructor' }}</a>
            </h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! html()->form('POST', url('admin/instrusctor/'.$instructor->instructor_id))->attribute('enctype', 'multipart/form-data')->open() !!}
            @csrf
            {!! html()->hidden('_method', 'PUT') !!}

            <div class="row">
                <!-- Name Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Instructor Name')->for('instructor_name') !!}
                        {!! html()->text('instructor_name')->class('form-control')->value(old('instructor_name', $instructor->instructor_name))->placeholder('Instructor Name') !!}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {!! html()->button('Update Instructor', 'submit')->class('btn btn-success') !!}
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
