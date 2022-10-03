@extends('layouts.app')

@section('title')
    المنتجات المحذوفة
@endsection


@section('content')

    <div class="container">
      <div class="div-table mt-5">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                @if(count($products) == false)
                    <div class="alert alert-danger">

                        {{__('No products to show')}}
                    </div>
                @endif
                @foreach($products as $item)
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->price }} Pound</td>
                    <td class="col_action">
                        <div class="actions">
                        @if(Auth::user()->id == $item->user_id)
                                <a href="{{route("product.back.from.trash", $item->id)}}" class="btn btn-success mb-1">Restore</a>
                                <form id="delete-user-form" class="d-inline-block" action="{{route("product.delete_from.database", $item->id)}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-danger confirm_deleteForever">Delete forever</button>
                                </form>

                            @else
                                <div class="col-sm">
                                   <p>cant be accessed</p>
                                </div>
                            @endif
                        </div>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    {!! $products->links() !!}     <!-- عشان يعرض عدد معين من الصفوف في الصفحة الواحدة -->
    </div>
@endsection

