@extends('layouts.layouts')
@section('title')
    Permission
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="row">

            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="name" placeholder="The name search...">
                    <span class="input-group-btn">
                  </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="email" placeholder="The email search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="search" type="button"> Search </button>
                  </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <!-- Default panel contents -->
        <div class="panel-heading">The user display</div>
        <!-- Table -->
        <div id="show">
        <table class="table">
           <tr>
               <td>User ID</td>
               <td>User name</td>
               <td>User email</td>
               <td>User desc</td>
               <td>User level</td>
           </tr>
            @foreach($data as $v)
                <tr a_id="{{ $v['admin_id'] }}">
                    <td>{{$v['admin_id']}}</td>
                    <td>{{$v['a_name']}}</td>
                    <td>{{$v['a_email']}}</td>
                    <td>{{$v['a_desc']}}</td>
                    <td>
                        <select class="p_id">
                            @foreach($pemission as $va)
                                @if($va['p_id']==$v['p_id'])
                                    <option value="{{ $va['p_id'] }}" selected>{{$va['p_name']}}</option>
                                @else
                                    <option value="{{ $va['p_id'] }}">{{$va['p_name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $data->links() }}
        </div>
    </div>
    <script>
        $(function () {
            $(document).on("change",".p_id",function () {
                var data={};
                data.p_id=$(this).val();
                data.admin_id=$(this).parents("tr").attr("a_id");
                $.ajax({
                    method:"POST",
                    url:"/admin/update",
                    data:data,
                    dataType: "json",
                    success:function (res) {

                    }
                })
            })


            $(document).on("click","#search",function () {
                var data={};
                data.name=$("#name").val();
                data.email=$("#email").val();
                $.ajax({
                    method:"POST",
                    url:"/admin/admin/search",
                    data:data,
                    success:function (res) {
                        $("#show").empty();
                        $("#show").html(res);
                    }
                })
            })
        })
    </script>
@endsection
