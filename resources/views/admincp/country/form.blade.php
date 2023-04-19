@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">quản lý Quốc Gia</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($country))
                        {!! Form::open(['route' => 'country.store','method'=>'POST'   ]) !!}
                    @else
                        {!! Form::open(['route' => ['country.update',$country->id],'method'=>'PUT'   ]) !!}
                    @endif
                            <div class="form-group">     
                                {!! Form::label('Title','Title',[]) !!}
                                {!! Form::text('title',isset($country)? $country->title:'',['class'=>'form-control','placeholder'=>'nhập dữ liệu'])!!}
                            </div>
                            <div class="form-group">     
                                {!! Form::label('Decription','Decription',[]) !!}
                                
                                {!! Form::textarea('decription',isset($country)? $country->description : '',['style'=>'resize:none','class'=>'form-control','placeholder'=>'nhập dữ liệu'])!!}
                            </div>
                            <div class="form-group">     
                                {!! Form::label('Active','Active',[]) !!}
                                {!! Form::select('status',['1'=>'hiển thị','0'=>'không hiển thị'],isset($country)?$country->status:'',['class'=>'form-control'])!!}
                            </div>
                        @if(!isset($country))
                            <div class="form-group">     
                                {!! Form::submit('Thêm dữ liệu',['class'=>'btn btn-success']) !!}
                            </div>
                        @else
                        <div class="form-group">     
                                {!! Form::submit('Cập nhập',['class'=>'btn btn-success']) !!}
                            </div>
                        @endif    
                        {!! Form::close() !!}
                </div>
            </div>
                 <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Decription</th>
                    <th scope="col">Active</th>
                    <th scope="col">manage</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($list as $key=>$cate)
                        <tr>
                        <th scope="row">{{$key}}</th>
                        <td>{{$cate->title}}</td>
                        <td>{{$cate->description}}</td>
                        <td>
                            @if($cate->status==1)
                            hiển thị
                            @else
                            không hiển thị
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE','route'=>['country.destroy',$cate->id],'onsubmit'=>'return confirm("xoá hay không ?")']) !!}
                                {!! form::submit('Xoá',['class'=>'btn btn-danger'])!!}                               
                            {!! Form::close() !!}
                            <a href="{{route('country.edit',$cate->id)}}"class ="btn btn-warning">sửa</a>
                        </td>
                        </tr>
                       
                        @endforeach
                       
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
