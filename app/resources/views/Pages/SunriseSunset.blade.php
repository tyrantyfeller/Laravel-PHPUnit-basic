@extends('index')

@section('content')
<div class="container">
        <form action="{{ route('getSunriseSunset')}}" method="POST">
            @csrf

            <div class="py-5 text-center">
                <h2>Sunrise and Sunset Event</h2>
            </div>

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {!! implode('', $errors->all(':message <br />')) !!}
                </div>
            @endif

            @if(!empty($message_error))
                <div class="alert alert-danger" role="alert">
                    {{$message_error}}
                </div>
            @endif

            <div class="mb-6">
                <label for="latitude">Latitude of the Event</label>
                <input required type="number" step=any class="form-control" name="latitude" id="latitude" value="{{ !empty($request['latitude']) ? $request['latitude'] : '' }}" placeholder="-00.0000000">
            </div>
            <div class="mb-6">
                <label for="longitude">Longitude of the Event</label>
                <input required type="number" step=any class="form-control" name="longitude" id="longitude" value="{{ !empty($request['longitude']) ? $request['longitude'] : '' }}" placeholder="-00.0000000">
            </div>
            <div class="mb-6">
                <label for="type">Event Type</label>
                <select class="form-control" name="type" id="type">
                    <option value="sunrise" {{ $request['type'] == 'sunrise' ? 'selected' : '' }}>Sunrise</option>
                    <option value="sunset" {{ $request['type'] == 'sunset' ? 'selected' : '' }}>Sunset</option>
                </select>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Send</button>
        </form>
    </div>
    <br/>

    @if(!empty($response))
    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $response['type'] == 'sunrise' ? 'Sunrise' : 'Sunset' }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Remaing time: {{ $response['remaing_time'] }}</li>
                        <li>Request date and time: {{ $response['exact_datetime'] }}</li>
                        <li>Event date and time: {{ $response['request_datetime'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
