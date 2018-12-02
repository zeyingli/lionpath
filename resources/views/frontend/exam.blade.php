@extends('layouts.master')

@section('site_title')
Viewing Exam Schedule
@endsection

@section('content')
	<div class="page-content">
        <div class="content-sticky-footer">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                     {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        	<h2 class="block-title text-center">My Exam Schedule</h2>
        	<div class="row mx-0">
                <div class="col">
                    <div id="accordion">
                		@foreach($exams as $exam)
                        @php
                            $class = App\Models\Classes::find($exam->class_id);
                            $build = App\Models\Building::find($exam->building_id);
                            $name = $build->name;
                            $lat = $build->lat;
                            $lng = $build->lng;

                            $start = Carbon\Carbon::parse($exam->start_time);
                            $end = Carbon\Carbon::parse($exam->end_time);
                            $duration = $end->diffInMinutes($start);
                        @endphp
                    	<div class="card mb-1 border-0 rounded-0">
                    		<div class="card-header bg-primary rounded-0 py-2" id="headingOne">
                                <a href="javascript:void(0)" class="" data-toggle="collapse" data-target="#collapse{{ $exam->id }}" aria-expanded="false" aria-controls="collapse{{ $exam->id }}">
                                	<p class="text-white">
                                		<i class="material-icons icon">assessment</i>
                                		<strong>{{ $class->name }} Final Exam</strong>
                                		@if($class->status === 0)
                                			<span class="badge badge-info">Confirmed</span>
                                		@elseif($class->status === 1)
                                			<span class="badge badge-danger">Canceled</span>
                                		@else
                                		<span class="badge badge-default">Unknown</span>
                                		@endif
                                	</p>
                                </a>
                            </div>

                           <div id="collapse{{ $exam->id }}" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    @if($class->status === 0)
                                    	Exam Room: <a href="https://maps.apple.com/?q={{ $lat }},{{ $lng }}">{{ $name }} - {{ $exam->room }}</a> <br>
                                    	Exam Duration: {{ $duration }} Minutes <br>

                                        <div class="row mx-0 mt-3">
                                            <div class="col align-self-end">
                                                <a href="{{ url('/find/exam') }}/{{ $exam->id }}" class="btn btn-block btn-outline-primary">Locate My Exam Room</a>
                                            </div>
                                        </div>
                                        <div class="row mx-0 mt-2">
                                            <div class="col align-self-end">
                                                @php
                                                    $notified = App\Models\Notification::where([
                                                        ['users_id', Auth::id()],
                                                        ['exam_id', $exam->id],
                                                    ])->exists();
                                                @endphp
                                                @if(!$notified)
                                                <form action="{{ url('/notification/add') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                                                    <button type="submit" class="btn btn-block btn-outline-info">Notify Me on Exam Date</button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
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