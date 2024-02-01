@extends('admin.layout.layout')
@section('title')
Create Room
@endsection
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <div class="">
                    <a>{{ !empty($title) ? $title : 'Create Room' }}</a>
                </div>
            </h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! html()->form('POST', url('admin/room'))->open() !!}
            @csrf

            <div class="row">
                <!-- Room Name Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Room Name')->for('room_name') !!}
                        {!! html()->text('room_name')->class('form-control')->value(old('room_name'))->placeholder('Room Name') !!}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {!! html()->button('Add Room', 'submit')->class('btn btn-success') !!}
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
