@extends('layouts.master')

@section('nav')
    <div class="row">
        <div class="col-sm-4">
            <a href="{{url('/')}}" class="btn btn-lg btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="col-sm-4 text-center">
            <h2>{{$todo->name}}</h2>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endsection

@section('content')
    <div class="container">

        <div class="row table-title">
            <div class="col-sm-12">
                <h3>Feladat</h3>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Name</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{$todo->name}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Status</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{$todo->status}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Description</h6>
                </div>
                <div class="col-sm-9 text-secondary"> {{$todo->description}}</div>
            </div>
            <hr>

        </div>
    </div>

    @include('layouts/assigned_users')

@endsection
