@extends('admin.layout.layout')

@section('title')
    Select Department and Year
@endsection

@section('content')
<div class="container">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Select Department and Year</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/calendar/show') }}" method="GET">
                <div class="form-group">
                    <label for="department-selector">Department</label>
                    <select id="department-selector" name="dept_id" class="form-control">
                        <option value="">Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->dept_id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="year-selector">Year</label>
                    <select id="year-selector" name="year" class="form-control">
                        <option value="">Select Year</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Show Calendar</button>
            </form>
        </div>
    </div>
</div>
@endsection
