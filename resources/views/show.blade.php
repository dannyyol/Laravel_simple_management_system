@extends('layout.layout')

@section('content')
    <div class="container" style="margin-top:100px;">
        <h3>Details of staff with ID {{$staff->id}}</h3>
        <br>
        <div class="row">
            <div class="card text-left">
              <div class="card-body">
                  <ul class="list-group">
                      <li class="list-group-item"><strong>Name:</strong> {{$staff->staff_name}}</li>
                      <li class="list-group-item"><strong>Email: </strong>{{$staff->staff_email}}</li>
                  </ul>
              </div>
            </div>

            <div class="card text-left">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Contact Number:</strong> {{$staff->staff_phonenumber}}</strong></li>
                        <li class="list-group-item"><strong>Address: </strong>{{$staff->staff_address}}</strong></li>
                    </ul>
                </div>
              </div>

        </div>
    </div>    
@endsection
