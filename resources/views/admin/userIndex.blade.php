@extends('authAdmin.layout')



@section('title')
   عرض بيانات العملاء المنتظمين
@endsection




@section('content')

    <div class="container">
    <!-- This form for search users -->
    <div class="col-xs-10 offset-xs-2 col-sm-8 offset-sm-2  mt-5 mb-3 div-search">
        <form action="{{route('users.index')}}" method="get">
            @csrf
            <input type="text" name="input_search" id="q" class="form-control input-search">
            <button type="submit" class="btn btn-primary mt-1 mb-2 btn-search">ابحث</button>
        </form>
    </div>

        <!-- message-search -->
        <div class="message-search">
            @if(session('status'))
                <div class="alert alert-primary mt-2">
                    {{ session('status') }}
                </div>
            @endif
        </div>

            @if($message = Session::get('success'))
                <div class="alert alert-primary" role="alert">{{ $message }}</div>
            @endif


        @if(count($user) == false)
            <div class="alert alert-danger">

                {{__('لا يوجد مستخدمين لعرضهم')}}
            </div>
        @endif

        <div class="div-table">
         <table class="table table-bordered">
            <thead>
            <tr>
              {{--  <th scope="col">#</th>  --}}
                <th scope="col">الإسم</th>
                <th scope="col">البريد الإلكتروني</th>
                <th scope="col">الهاتف</th>
                <th scope="col">العنوان</th>
                <th scope="col">الإعدادات</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                @foreach($user as $item)
                  @if($item->role == 'user')
                {{--   <td>{{ $item->id }}</td> --}}
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->mobile }}</td>
                    <td>{{ $item->address }}</td>
                    <td class="col_action">
                        <div class="actions">
                                <a href="{{route("users.edit", $item->id)}}" class="btn btn-primary mb-1">تعديل</a>
                                <a href="{{route("showProductsOfUser", $item->id)}}" class="btn btn-success mb-1">عرض المنتجات</a>
                                <a href="{{route("soft.deleteUser", $item->id)}}" class="btn btn-danger mb-1">حذف</a>

                                {{--  <div class="col-sm">
                                    <form action="{{route('users.destroy', $item->id)}}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger" style="display:inline">Delete</button>
                                    </form>
                                 </div>
                            --}}
                        </div>
                    </td>
            </tr>
            @endif
            @endforeach

            </tbody>
        </table>
        </div>
    {{ $user->links('pagination::bootstrap-4') }}    <!-- عشان يعرض عدد معين من الصفوف في الصفحة الواحدة -->
    </div>
    </div>
@endsection

