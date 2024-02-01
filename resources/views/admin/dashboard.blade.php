@extends('admin.layout.layout')
@section('title')
Home Page
@endsection
@section('content')

<section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                
                @php
                $departmentCount = \App\Models\Department::count(); 
                @endphp
              <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $departmentCount }}</h3>
                        <p>Department</p>
                    </div>
                    <div class="icon">
                        @if($departmentCount >= 100)
                            <i class="ion ion-ios-albums-outline"></i>
                        @elseif($departmentCount >= 50)
                            <i class="ion ion-ios-book-outline"></i>
                        @else
                            <i class="ion ion-ios-briefcase-outline"></i>
                        @endif
                    </div>
                    <a href="{{ url('admin/department') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            @php
            $courseCount = \App\Models\Course::count(); 
            @endphp
              <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $courseCount }}</h3>
                        <p>Course</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-book-outline"></i> <!-- Change the icon to books or any other course-related icon -->
                    </div>
                    <a href="{{ url('admin/course') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            @php
            $adminCount = \App\Models\Admin::count(); 
            @endphp
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{  $adminCount  }}</h3>
                            <p>Admins</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="{{ url('admin/admins') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @php
                    $insCount = \App\Models\Instructor::count(); 
                @endphp
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{  $insCount  }}</h3>
                            <p>Instrusctor</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-briefcase"></i>
                        </div>
                        <a href="{{ url('admin/instrusctor') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @php
                    $roomCount = \App\Models\Room::count(); 
                @endphp
                <div class="col-lg-3 col-6">
                   <div class="small-box bg-secondary">
                     <div class="inner">
                      <h3>{{$roomCount}}</h3>
                       <p>Room</p>
                       </div>
                     <div class="icon">
                     <i class="fas fa-door-open"></i> <!-- Change the icon to represent a room -->
                    </div>
                 <a href="{{ url('admin/room') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
