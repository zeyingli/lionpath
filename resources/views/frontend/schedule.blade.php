@extends('layouts.master')

@section('site_title')
Viewing Class Schedule
@endsection

@section('content')
	<div class="page-content">
        <div class="content-sticky-footer">
        	<h2 class="block-title text-center">My Class Schedule</h2>
        	<div class="row mx-0">
                <div class="col">
                    <div id="accordion">
                		@foreach($schedules as $schedule)
                    	<div class="card mb-1 border-0 rounded-0">
                    		<div class="card-header bg-primary rounded-0 py-2" id="headingOne">
                                <a href="javascript:void(0)" class="" data-toggle="collapse" data-target="#collapse{{ $schedule->id }}" aria-expanded="false" aria-controls="collapse{{ $schedule->id }}">
                                	<p class="text-white">
                                		<i class="material-icons icon">book</i>
                                		<strong>{{ $schedule->name }}</strong>
                                		@if($schedule->status === 0)
                                			<span class="badge badge-success">Enrolled</span>
                                		@elseif($schedule->status === 1)
                                			<span class="badge badge-danger">Dropped</span>
                                		@else
                                		<span class="badge badge-default">Unknown</span>
                                		@endif
                                	</p>
                                </a>
                            </div>

                           <div id="collapse{{ $schedule->id }}" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    @if($schedule->status === 0)
                                    	Class Nbr: {{ $schedule->nbr }} <br>
                                    	Class Unit: {{ $schedule->unit }} <br>
                                    	Class Section: {{ $schedule->section }} <br>
                                    	@php
                                    		$building = App\Models\Building::find($schedule->building_id);
                                    		$name = $building->name;
                                    		$lat = $building->lat;
                                    		$lng = $building->lng;
                                    	@endphp
                                    	Class Room: <a href="https://maps.apple.com/?q={{ $lat }},{{ $lng }}">{{ $name }} - {{ $schedule->room }}</a> <br>
                                    	Class Period: {{ $schedule->period }} <br>
                                    	Instructor: {{ $schedule->instructor }} <br>
                                    	Start Date: {{ $schedule->start_date->format('Y-m-d') }} 
                                    	<br>
                                    	End Date: {{ $schedule->end_date->format('Y-m-d') }} <br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    	@endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection