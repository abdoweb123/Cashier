@extends('authAdmin.layout')


@section('title')
    عرض بيانات العميل
@endsection




@section('content')

<div class="container">
   <div class="wrapper fadeInDown">
     <div id="formContent">
        <div class="card">
            <div class="card-body">
                <p class="card-text"> user name : {{$user->name}} </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="card-text"> user email : {{$user->email}} </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="card-text"> user mobile : {{$user->mobile}} </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="card-text"> user address : {{$user->address}} </p>
            </div>
        </div>

     </div>
   </div>
</div>

@endsection


