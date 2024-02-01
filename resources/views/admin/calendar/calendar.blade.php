@extends('admin.layout.layout')

@section('title')
Calendar
@endsection

@section('css')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ url('admin/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/print-js/dist/print.min.css">

<!-- Add custom CSS here if needed -->
<style>
    .clickable-cell {
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .clickable-cell:hover {
        background-color: #f2f2f2; /* Light color for hover effect */
    }

    .delete-lecture-icon, .edit-lecture-icon {
        cursor: pointer;
        
        margin-left: 5px;
        font-weight: bold;
    }

    .delete-lecture-icon {
        color: red;
        font-size: 20px;
    }

    .edit-lecture-icon {
        color: green;
        font-size: 16px;
    }

    .edit-lecture-icon:hover, .delete-lecture-icon:hover {
        opacity: 0.7; /* Hover effect */
    }

/* Base Table Styling */
.table {
    border-collapse: separate;
    border-spacing: 0; /* Removes space between borders */
    width: 100%;
    font-family: Arial, sans-serif; /* Modern, readable font */
}

.table th, .table td {
    border: 1px solid #e1e1e1; /* Consistent border color */
    padding: 15px; /* Adequate padding for content */
    text-align: center;
    vertical-align: middle;
    min-height: 50px; /* Ensures consistent height */
}

/* Header Styling */
.table thead th {
    background-color: #00bcd4; /* A blend of blue and cyan */
    color: white;
    font-size: 16px;
}

/* Body Styling */
.table tbody tr {
    background-color: white; /* Default background for rows */
}

/* Filled Cell Styling */
.filled-cell {
    background-color: #394c62; /* Light green background for filled cells */
    color: white; /* White text for better readability */
}



/* Clickable Cell Styling */
.clickable-cell, .filled-cell {
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Icon Styling */
.edit-lecture-icon, .delete-lecture-icon {
    cursor: pointer;
    font-size: 16px; /* Set a fixed size for the icons */
    color: #ffffff; /* Choose a color that stands out on #fd9d3c background */
    width: 20px; /* Fixed width for consistency */
    text-align: center; /* Center the icon */
    margin: 0 5px; /* Margin for spacing */
}



/* Filled Cell Text and Icon Styling */
.filled-cell p {
    margin-bottom: 10px; /* Space under each text element */
}

.filled-cell .icon-container {
    display: inline-block;
    border-radius: 10px; /* Circular border */
    padding: 5px; /* Padding around icon */
    margin: 2px; /* Spacing between icons */
    transition: background-color 0.2s ease-in-out;
    background:white;
}

.filled-cell .icon-container:hover {
    background-color: #d3d3d3; /* Fill effect on hover */
    cursor: pointer;

}

.filled-cell .icon-container i {
    color: black;
        font-size: 14px; /* Icon size */
}

.filled-cell .icon-container:hover i {
    color: #000000; /* Icon color on hover */
}





</style>
@endsection

@section('content')
<div class="container">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
            </div>
        </div>
        <div class="card-body">
            <!-- Department and Year Selectors -->
            <div class="row">
                <div class="col-md-6">
                    <h2>Department: {{$department->department_name}}</h2>
                </div>
                <div class="col-md-6">
                    <h2>Year: {{$year}}</h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-success" onclick="exportToExcel()">Export to Excel</button>
                    <button type="button" class="btn btn-primary" onclick="printTable()">Print</button>
                </div>
            </div>
            <hr>
            <!-- Weekly Schedule Table -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="schedule-table">
                            <thead>
                                <tr class="bg-light-gray">
                                    <th class="text-uppercase">Time</th>
                                    @foreach ($daysOfWeek as $day)
                                    <th class="text-uppercase">{{ $day }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($periods as $period)
                                <tr>
                                    <td class="align-middle">{{ $period->formatted_start_time }} - {{ $period->formatted_end_time }}</td>
                                    @foreach ($daysOfWeek as $index => $day)
                                        @php
                                            $lectureFound = false;
                                            $lectureData = null;
                                        @endphp
                                        @foreach ($lectures as $lecture)
                                            @if ($lecture->period_id == $period->period_id && $lecture->weekday == $index)
                                                @php
                                                    $lectureFound = true;
                                                    $lectureData = $lecture;
                                                @endphp
                                                @break
                                            @endif
                                        @endforeach

                                        @if ($lectureFound)
                                            <td class="filled-cell" data-lecture-id="{{ $lectureData->lecture_id }}"
                                                data-period-id="{{ $period->period_id }}" data-weekday="{{ $index }}"
                                                data-dept-id="{{$department->dept_id}}" data-year="{{$year}}"
                                                data-room-id="{{ $lectureData->room_id }}"
                                                data-instructor-id="{{ $lectureData->instructor_id }}"
                                                data-course-id="{{ $lectureData->course_id }}">
        
                                                <p>{{ $lectureData->course->course_name }}</p>
                                                <p>{{ $lectureData->instructor->instructor_name }}</p>
                                                <p>{{ $lectureData->room->room_name }}</p>
                                                <div class="icon-container" onclick="openModalForEdit({{ $lectureData->lecture_id }})">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                                <div class="icon-container" onclick="deleteLecture({{ $lectureData->lecture_id }}, event)">
                                                    <i class="fas fa-trash-alt"></i>
                                                </div>
                                            </td>
                                        @else
                                            <td class="clickable-cell" data-period-id="{{ $period->period_id }}"
                                                data-weekday="{{ $index }}" data-dept-id="{{$department->dept_id}}"
                                                data-year="{{$year}}" onclick="openModalForAdd(this)">
                                                <span class="text-muted">Click to Add</span>
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal for Adding/Editing Lectures -->
            <div class="modal fade" id="lectureModal" tabindex="-1" role="dialog" aria-labelledby="lectureModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lectureModalLabel">Add/Edit Lecture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Inputs Here -->
                            <form id="addLectureForm">
                                <input type="hidden" id="lectureId" name="lecture_id">
                                <input type="hidden" id="periodId" name="period_id">
                                <input type="hidden" id="weekday" name="weekday">
                                <input type="hidden" id="deptId" name="dept_id">
                                <input type="hidden" id="year" name="year">

                                <div class="form-group">
                                    <label for="room">Room</label>
                                    <select id="room" name="room_id" class="form-control" required>
                                        <option value="" disabled selected>Select a Room</option>
                                        @foreach ($rooms as $room)
                                        <option value="{{ $room->room_id }}">{{ $room->room_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="instructor">Instructor</label>
                                    <select id="instructor" name="instructor_id" class="form-control" required>
                                        <option value="" disabled selected>Select an Instructor</option>
                                        @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->instructor_id }}">{{ $instructor->instructor_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <select id="course" name="course_id" class="form-control" required>
                                        <option value="" disabled selected>Select a Course</option>
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="saveLecture()">Save Lecture</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/print-js/dist/print.min.js"></script>

<script>
var isEditMode = false;

function openModalForEdit(lectureId) {
    event.stopPropagation();
    isEditMode = true;
    var cell = $('td[data-lecture-id="' + lectureId + '"]');
    populateFormFields(cell, lectureId);
    $('#lectureModalLabel').text('Edit Lecture');
    $('#lectureModal').modal('show');
}

function openModalForAdd(cellElement) {
    isEditMode = false;
    $('#addLectureForm').trigger('reset');
    var cell = $(cellElement);
    populateFormFields(cell);
    $('#lectureModalLabel').text('Add Lecture');
    $('#lectureModal').modal('show');
}

function populateFormFields(cell, lectureId = null) {
    $('#lectureId').val(lectureId);
    $('#periodId').val(cell.data('period-id'));
    $('#weekday').val(cell.data('weekday'));
    $('#deptId').val(cell.data('dept-id'));
    $('#year').val(cell.data('year'));
    if (lectureId) {
        $('#room').val(cell.data('room-id')).trigger('change');
        $('#instructor').val(cell.data('instructor-id')).trigger('change');
        $('#course').val(cell.data('course-id')).trigger('change');
    }

}

function deleteLecture(lectureId, event) {
    event.stopPropagation();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/lecture/delete/' + lectureId,
                type: 'POST',
                data: { '_token': "{{ csrf_token() }}", '_method': 'DELETE' },
                success: function(response) {
                    Swal.fire('Deleted!', 'Your lecture has been deleted.', 'success');
                    var cellSelector = 'td[data-lecture-id="' + lectureId + '"]';
                    var cell = $(cellSelector);
                    cell.removeClass('filled-cell'); // Remove the filled-cell class
                    cell.addClass('clickable-cell'); // Remove the filled-cell class

                    cell.removeAttr('data-lecture-id data-room-id data-instructor-id data-course-id');
                    cell.html('<span class="text-muted">Click to Add</span>')
                },
                error: function(xhr, status, error) {
                    Swal.fire('Error!', error.message, 'error');
                }
            });
        }
    });
}

function saveLecture() {
    var lectureId = $('#lectureId').val();
    var endpoint = isEditMode ? '/admin/lecture/update/' + lectureId : '/admin/lecture/save';
    var lectureData = {
        'period_id': $('#periodId').val(),
        'weekday': $('#weekday').val(),
        'dept_id': $('#deptId').val(),
        'year': $('#year').val(),
        'room_id': $('#room').val(),
        'instructor_id': $('#instructor').val(),
        'course_id': $('#course').val(),
        '_token': "{{ csrf_token() }}"
    };

    $.ajax({
        url: endpoint,
        type: 'POST',
        data: lectureData,
        success: function (response) {
            var lecture = response.data;
            var cellSelector = 'td[data-period-id="' + lectureData.period_id + '"][data-weekday="' + lectureData.weekday + '"]';
            var cell = $(cellSelector);
            var cellContent = '<p>' + lecture.course.course_name + '</p>' +
                  '<p>' + lecture.instructor.instructor_name + '</p>' +
                  '<p>' + lecture.room.room_name + '</p>' +
                  '<div class="icon-container" onclick="openModalForEdit(' + lecture.lecture_id + ')">' +
                      '<i class="fas fa-edit"></i>' +
                  '</div>' +
                  '<div class="icon-container" onclick="deleteLecture(' + lecture.lecture_id + ', event)">' +
                      '<i class="fas fa-trash-alt"></i>' +
                  '</div>';
                cell.html(cellContent)
                .attr('data-lecture-id', lecture.lecture_id)
                .attr('data-period-id', lectureData.period_id)
                .attr('data-weekday', lectureData.weekday)
                .attr('data-dept-id', lectureData.dept_id)
                .attr('data-year', lectureData.year)
                .attr('data-room-id', lecture.room.room_id)
                .attr('data-instructor-id', lecture.instructor.instructor_id)
                .attr('data-course-id', lecture.course.course_id)
                .removeClass('clickable-cell')
                .removeAttr('onclick');
            $('#lectureModal').modal('hide');
            cell.addClass('filled-cell'); // Add this line to mark the cell as filled

            Swal.fire(isEditMode ? 'Updated!' : 'Added!', 'Your lecture has been processed.', 'success');
        },
        error: function(xhr, status, error) {
            let formattedErrors = formatValidationErrors(xhr);
            Swal.fire('Error!', formattedErrors || error.message, 'error');
        }
    });
}


function formatValidationErrors(response) {
    let messages = [];
    if (response.responseJSON && response.responseJSON.errors) {
        let errors = response.responseJSON.errors;
        for (let key in errors) {
            let errorString = errors[key].map(error => `<span style="color: #f27474;">${error}</span>`).join('<br>');
            messages.push(errorString);
        }
    }
    return messages.join('<br>'); // Separate different fields' errors with double <br> tags
}

function printTable() {
    printJS({ printable: 'schedule-table', type: 'html', header: 'Schedule', documentTitle: 'Schedule' });
}

function exportToExcel() {
    var table = document.getElementsByClassName('table')[0];
    var wb = XLSX.utils.book_new();
    var ws = XLSX.utils.table_to_sheet(table, {sheet: "Schedule"});

    XLSX.utils.book_append_sheet(wb, ws, "Schedule");
    XLSX.writeFile(wb, "Schedule.xlsx");
}
</script>

@endpush
