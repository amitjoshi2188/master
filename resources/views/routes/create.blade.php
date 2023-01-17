@extends('layouts.app')

@section('content')
<?php
$selectedValue = "";
$fromStation = "";
$toStation = "";
$timing = "";
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Route') }}</div>

                <div class="card-body">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left mb-2">
                                    <h2>Add Route</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('routes.index') }}"> Back</a>
                                </div>
                            </div>
                        </div>
                        @if(session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="{{ route('routes.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Route Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Route Name">
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <strong>Choose Bus:</strong>
                                        <select name="bus_id" id="bus_id" class="form-control">
                                            @foreach($buses as $key => $bus)
                                            <option value="{{$key}}" {{ $selectedValue == $key ? 'selected' : '' }}> {{ $bus }}</option>
                                            @endforeach
                                            @error('bus_id')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong>From Station:</strong>
                                        <select name="from_station_id" id="from_station_id" class="form-control">
                                            @foreach($stations as $key => $station)
                                            <option value="{{$key}}" {{ $fromStation == $key ? 'selected' : '' }}> {{ $station }}</option>
                                            @endforeach
                                            @error('from_station_id')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <strong>To Station:</strong>
                                        <select name="to_station_id" id="to_station_id" class="form-control">
                                            @foreach($stations as $key => $station)
                                            <option value="{{$key}}" {{ $toStation == $key ? 'selected' : '' }}> {{ $station }}</option>
                                            @endforeach
                                            @error('to_station_id')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong>Timings:</strong>
                                        <input type="datetime-local" name="timing" id="timing" class="form-control" placeholder="timing">
                                        @error('timing')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection