@extends('layouts.master')

@section('site_title')
Viewing Exam Classroom Location
@endsection

@section('content')
	<div class="page-content h-100">
        <div class="content-sticky-footer">
        	<h2 class="block-title text-center">
        		{{ $class->name === true ? $class->name : 'Showing All' }} <br>
        		Classroom Location
        	</h2>
        	<div class="row mt-0">
                <div class="col m-0">
                	<div style="width:100wh;height:100vh;">
                        {!! Mapper::render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection