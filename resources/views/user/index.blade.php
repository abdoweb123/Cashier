@extends('layouts.app')


@section('title')
عرض بيانات العملاء المنتظمين
@endsection



@section('content')

    <div class="container">
            <!-- This form for search product -->
            <div class="col-xs-10 offset-xs-2 col-sm-8 offset-sm-2  mt-5 mb-3 div-search">
                <form action="{{route('products.index')}}" method="get">
                    @csrf
                    <input type="text" name="input_search" id="q" class="form-control input-search">
                    <button type="submit" class="btn btn-primary mt-1 mb-2 btn-search">ابحث</button>
                </form>
            </div>

            <!-- message-search -->
            <div class="message-search">
                @if(session('status'))
                    <div class="alert alert-primary mt-3">
                        {{ session('status') }}
                    </div>
                @endif
            </div>


            @if($message = Session::get('success'))
                <div class="alert alert-primary" role="alert">{{ $message }}</div>
            @endif

        <div class="div-table">
         <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">photo</th>
                <th scope="col">quantity</th>
                <th scope="col">price</th>
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
                    <td>{{ $item->product_name }}</td>
                    <td><img style="width:100px; height:50px" src="{{asset('images/offers/' . $item->file_name)}}"></td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }} Pound</td>
                    <td class="col_action">
                        <div class="actions">
                                <a href="{{route("products.edit", $item->id)}}" class="btn btn-primary mb-1">Edit</a>
                                <a href="{{route("products.show", $item->id)}}" class="btn btn-success mb-1">Show</a>
                                <a href="{{route("soft.delete", $item->id)}}" class="btn btn-danger mb-1">Delete</a>


                    {{--
                           <div class="col-sm">
                              <form action="{{route('products.destroy', $item->id)}}" method="POST">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger" style="display:inline">Delete</button>
                              </form>
                           </div>
                  --}}
          </div>
      </td>
</tr>
@endforeach
</tbody>
</table>
        </div>
{{ $products->links('pagination::bootstrap-4') }}     <!-- عشان يعرض عدد معين من الصفوف في الصفحة الواحدة -->
</div>
@endsection

