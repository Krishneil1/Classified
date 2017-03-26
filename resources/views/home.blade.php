@extends('layouts.app')

@section('content')
    <div class="container">
        <!---<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>-->
        <div class="panel panel-info">
            <div class="panel-body">
            <div class="row">
            @foreach($areas as $country)
                <div class ="col-md-12">
                    <h3><a href ="{{route('user.area.store',$country) }}">{{$country->name}}</a></h3>
                    <hr>
                    <div class="row">
                        @foreach($country->children as $state)
                            <div class="col-md-4">
                                <h4><a href ="{{route('user.area.store',$state) }}">{{$state->name}}</a></h4>
                                <hr>
                                    @foreach($state->children as $city)
                                    <h5><a href ="{{route('user.area.store',$city) }}">{{$city->name}}</a></h5>
                                    @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection
