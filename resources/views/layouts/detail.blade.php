@extends('layouts.master')

@section('content')
    @dump($todo)
    <div class="container">
        <div class="row table-title">
            <div class="col-sm-12">
                <h2>Feladatok</h2>
            </div>
            <div class="col-sm-12">
                <a href="{{url('/')}}" class="btn btn-lg btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
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

@endsection
