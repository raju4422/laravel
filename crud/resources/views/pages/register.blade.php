@extends('layout')
@section('content')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <form action="{{route('store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="first_name" placeholder="Enter First Name" value="{{old('first_name')}}" name="first_name" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="first_name">First Name</label> -->
                                         @error('first_name')
                                        <span class="text-danger text-center">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}" placeholder="Enter Last Name" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="last_name">Last Name</label> -->
                                        @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="form-outline  w-100">
                                        <input type="password" class="form-control form-control-lg" value="{{old('password')}}" placeholder="Enter Password" id="password" name="password" />
                                        <!-- <label for="password" class="form-label">Password</label> -->
                                         @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 pb-1">Gender: </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" checked />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Enter Email" class="form-control form-control-lg" />
                                         @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="tel" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter Phone" class="form-control form-control-lg" />

                                         @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
