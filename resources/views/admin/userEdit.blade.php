@extends('authAdmin.layout')


@section('title')
    تعديل بيانات العميل
@endsection




@section('content')

  <div class="container">
     <div class="wrapper fadeInDown">
       <div id="formContent">
        <form action="{{route('users.update', $user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group content-input mt-sm-2 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">User name</label>
                </div>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleFormControlInput1" placeholder="Product Name">
            </div>
            <div class="form-group content-input mt-sm-2 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">User email</label>
                </div>
                <input type="text" name="email" value="{{$user->email}}" class="form-control" id="exampleFormControlInput1" placeholder="Product Price">
            </div>

            <div class="form-group content-input mt-sm-2 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">User mobile</label>
                </div>
                <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" id="exampleFormControlInput1" placeholder="Product Price">
            </div>

            <div class="form-group content-input mt-sm-2 mt-xs-1">
                <div class="div-label">
                    <label for="exampleFormControlInput1">User address</label>
                </div>
                <input type="text" name="address" value="{{$user->address}}" class="form-control" id="exampleFormControlInput1" placeholder="Product Price">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-2 create-btn">Update</button>
            </div>

        </form>
       </div>
     </div>
  </div>

@endsection
