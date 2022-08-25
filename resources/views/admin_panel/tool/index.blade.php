@extends('admin_panel.layout.master');

@section('content')


<div class="main-content app-content mt-0">
    <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Tools</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tools List</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <span class="card-title">Tools List</span>
                                        <span class="card-title "><a href="{{route('tools.create')}}"> Add New Tool</a></span>
                                    </div>
                                    <div class="card-body">

                                        @include('admin_panel.frontend.includes.messages')
                                        {{-- <p>Use <code class="highlighter-rouge">.table-striped</code>to add zebra-striping to any table row within the <code class="highlighter-rouge">.tbody</code>.</p> --}}
                                        <div class="table-responsive">
                                            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Slug</th>
                                                        <th>Category</th>
                                                        <th>Image</th>


                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tools as $tool )
                                                    <tr>
                                                        <td>{{ $loop->index +1}}</td>
                                                        <td>{{$tool->title}}</td>
                                                        <td>{{$tool->slug}}</td>
                                                        <td>{{$tool->category->title}}</td>
                                                        <td><img src='{{asset($tool->image)}}' width="100px" height="100px"/></td>

                                                        <td>

                                                        <a href="{{route('tools.edit',$tool->id)}}" class="btn btn-info btn-sm">Edit</a>
                                                        {!! Form::open(['method' => 'DELETE','route' => ['tools.destroy', $tool->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                                        {!! Form::close() !!}
                                                        </td>
                                                    </tr>

                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CONTAINER CLOSED -->

    </div>
</div>



@endsection
