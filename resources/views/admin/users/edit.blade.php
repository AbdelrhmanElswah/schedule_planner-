@extends('admin.layout.layout')

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <a>{{ $title ?? 'Edit User' }}</a>
            </h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! html()->form('POST', url('admin/users/'.$user->id))->attribute('enctype', 'multipart/form-data')->open() !!}
            @csrf
            {!! html()->hidden('_method', 'PUT') !!}

            <div class="row">
                <!-- Name Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Name')->for('name') !!}
                        {!! html()->text('name')->class('form-control')->value(old('name', $user->name))->placeholder('Name') !!}
                    </div>
                </div>

                <!-- Email Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Email')->for('email') !!}
                        {!! html()->email('email')->class('form-control')->value(old('email', $user->email))->placeholder('Email') !!}
                    </div>
                </div>

                <!-- Type Field -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Type')->for('type') !!}
                        {!! html()->select('type', ['customer' => 'Customer', 'merchant' => 'Merchant'], old('type', $user->type))->class('form-control') !!}
                    </div>
                </div>

                <!-- Password Fields -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Password')->for('password') !!}
                        {!! html()->password('password')->class('form-control')->placeholder('New Password (leave blank if unchanged)') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Confirm Password')->for('password_confirmation') !!}
                        {!! html()->password('password_confirmation')->class('form-control')->placeholder('Confirm New Password') !!}
                    </div>
                </div>

                <!-- Additional Fields -->
                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Phone Number')->for('phone_number') !!}
                        {!! html()->text('phone_number')->class('form-control')->value(old('phone_number', $user->phone_number))->placeholder('Phone Number') !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Country')->for('country') !!}
                        {!! html()->text('country')->class('form-control')->value(old('country', $user->country))->placeholder('Country') !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('About Us')->for('about_us') !!}
                        {!! html()->textarea('about_us')->class('form-control')->value(old('about_us', $user->about_us))->placeholder('About Us') !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('WhatsApp')->for('whatsapp') !!}
                        {!! html()->text('whatsapp')->class('form-control')->value(old('whatsapp', $user->whatsapp))->placeholder('WhatsApp') !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! html()->label('Instagram')->for('instagram') !!}
                        {!! html()->text('instagram')->class('form-control')->value(old('instagram', $user->instagram))->placeholder('Instagram') !!}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {!! html()->button('Update User', 'submit')->class('btn btn-success') !!}
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
