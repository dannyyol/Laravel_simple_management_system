@extends('layout.layout')
@section('content')
<div class="container">
    <br><br><br><br>
    @include('session.success')
    <div class="row">
        <div class="col-lg-12">
            <div class="col-sm-6">
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <li class="text-danger"> {{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="card">
            <h5 class="card-header bg-dark text-white">Add New Staff</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('staff.store')}}"  style="width:700px;">
                        {{ csrf_field () }}
                        <div class="form-group">
                            <label>Staff Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="staff_name" value="{{ old('staff_name')}}">
                            <small id="emailHelp" class="form-text text-muted">
                            </small>


                        </div>
                        <div class="form-group">
                            <label>Staff Email</label>
                            <input type="email" class="form-control" name="staff_email" placeholder="Enter Your Email" value="{{ old('staff_email')}}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="staff_phonenumber" placeholder="Enter Your Phone Number" value="{{ old('staff_phonenumber')}}">
                        </div>
                        <div class="form-group">
                            <label>Staff Address</label>
                            <textarea type="text" class="form-control" placeholder="Enter Your Address" value="{{ old('staff_address')}}" name="staff_address"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection
