@extends('layouts.master')

@section('site_title')
User Dashboard
@endsection

@section('content')
	<div class="page-content">
        <div class="content-sticky-footer">
            <div class="background bg-170 bg-primary"></div>
            <div class="row mx-0 userblock-ht">
                <div class="col mt-4">
                    <a href="javascript:void(0)" class="media">
                        <div class="w-auto h-100">
                            <figure class="avatar avatar-120"><img src="{{ config('app.cdn') }}images/user.png" alt="User Avatar"> </figure>
                        </div>
                        <div class="media-body align-self-center ">
                            <h5 class="text-white">{{ $currentUser->name }} <span class="status-online bg-success"></span></h5>
                            <p class="text-white">
                                Student <span class="status-online bg-color-success"></span>
                                <br> {{ $currentUser->email }}
                                <br> Major: {{ $currentUser->major }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row mx-0">
            	<div class="col">
            		<div class="card-footer px-0">
                        <div class="row no-gutters">
                            <div class="col">
                                <i class="material-icons text-warning">grade</i>
                                <span class="post-seconds"><strong>3.8</strong>/4.0 <span>(GPA)</span></span>
                            </div>
                            <div class="col">
                                <i class="material-icons text-success">check_circle</i>
                                <span class="post-seconds">No Holds</span>
                            </div>
                        </div>
                     </div>
            	</div>
            </div>
            <h2 class="block-title">My Class Schedule</h2>
            <ul class="list-group">
            	@foreach($classes as $class)
                <li class="list-group-item">
                    <a href="javascript:void(0)" class="media">
                        <div class="media-body">
                            <h5>{{ $class->name }}</h5>
                            <p>{{ $class->period }}</p>
                            <h2 class="title-number-carousel color-primary">
                            	<small>Grade:</small>
                            	<span class="text-primary">A</span>
                            </h2>
                        </div>
                        <div class="w-auto">
                            @if($class->status === 0)
                            	<span class="badge badge-success">Enrolled</span>
                            @endif
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection