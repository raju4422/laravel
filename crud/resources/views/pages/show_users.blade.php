@extends('layout')
@section('content')
<div class="<?php if($two_rows){ echo "container_fluid";}else { echo "container";}?> pt-5">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="row">
        <div class="{{$column}}">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S.no</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_details as $val)
                    <tr>
                        <th scope="row">{{$val['id']}}</th>
                        <td>{{$val->first_name}} {{$val->last_name}} </td>
                        <td>{{$val['email']}}</td>
                        <td>{{$val['phone']}}</td>
                      
                        <td><a href="{{url('/edit')}}/{{$val['id']}}">Edit</a> <a class="remove" data-delete="{{$val['id']}}" href="javascript:void(0)">Delete</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($two_rows)
        <div class="col-md-6 col-xs-12">
            <form role="form" action="{{route('update')}}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" class="form-control input-lg" tabindex="1" value="{{$user_data['id']}}">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" value="{{$user_data['first_name']}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" value="{{$user_data['last_name']}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Phone" value="{{$user_data['phone']}}" tabindex="3">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" value="{{$user_data['email']}}" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                </div>
                <div class="form-group">
                    <div class="col-sm-12" style="display: inline-flex;" >
                        <label for="input-type">Geneder </label>
                        <div id="input-type" class="row" style="margin:0px 20px">
                            <div class="" style="margin:0px 10px">
                                <label class="radio-inline">
                                    <input name="gender" id="input-type-student" <?php if($user_data['gender']=='male'){ echo 'checked';}?> value="male" type="radio" />Male
                                </label>
                            </div>
                            <div class="">
                                <label class="radio-inline">
                                    <input name="gender" id="input-type-tutor" value="female" <?php if($user_data['gender']=='female'){ echo 'checked';}?> type="radio" />Female
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6"><input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>

<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).data("delete");
        console.log(id);

        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: base_url + '/delete/'+id,
               type: 'POST',
               dataType :'JSON',
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                },
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                  //  $("#"+id).remove();
                       location.reload();
 
               }
            });
        }
    });


</script>

@endsection
