@extends('layout.layout')
@section('content')
<div class="container">
    <br><br><br><br>
    @include('session.success')
    <div class="row">
        <div class="col-lg-12">
            <div class="col-sm-6">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <li class="text-danger"> {{ $error }}</li>
                    @endforeach
                @endif
            </div>
            <div class="card">
            <h5 class="card-header bg-dark text-white">Add New Staff</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('staff.update', $staff->id)}}"  style="width:700px;">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field () }}
                        <div class="form-group">
                            <label>Staff Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="staff_name" value="{{ $staff->staff_name}}">
                            <small id="emailHelp" class="form-text text-muted">
                                @foreach ($errors as $error)
                                    <li class="text-danger"> {{ $error->staff_name }}</li>
                                @endforeach
                            </small>


                        </div>
                        <div class="form-group">
                            <label>Staff Email</label>
                            <input type="email" class="form-control" name="staff_email" placeholder="Enter Your Email" value="{{ $staff->staff_email }}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="staff_phonenumber" placeholder="Enter Your Phone Number" value="{{ $staff->staff_phonenumber}}">
                        </div>
                        <div class="form-group">
                            <label>Staff Address</label>
                            <textarea type="text" class="form-control" placeholder="Enter Your Address" value="" name="staff_address">{{ $staff->staff_address }}</textarea>
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
