@extends('layouts.backapp')
@section('backend_content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                     <div class="card">
                            <div class="card-header">
                               <h5>All Category</h5>
                                <a class="btn btn-primary float-right" href="{{ url('category/add_category') }}">Add Category</a>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="new-cons" class="table table-striped table-bordered nowrap">
                                        <div class="col-md-5">
                                            </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif

                <div class="col-md-5">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Category name</th>
                                            <th>Category Slug</th>
                                            <th>Status</th>
                                            <th>Created date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($category_data as $category_row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $category_row->category_name }}</td>
                                            <td>{{ $category_row->category_slug }}</td>
                                            <td>

                                                @if($category_row->status == 1) 
                                                <div class="label-main">
                                                    <label class="label label-success">Active</label>
                                                </div>
                                                @else
                                                <div class="label-main">
                                                    <label class="label label-danger">Inactive</label>
                                                </div>
                                                @endif

                                            </td>
                                            <td>{{ $category_row->created_at }}</td>
                                            <td>
                                                <a href="{{ url('category/edit_category/'.$category_row->id) }}">
                                                    <i style="font-size: 22px;" class="ti ti-pencil-alt"></i>
                                                </a>
                                                <!-- <a href="">
                                                    <i style="font-size: 22px;margin-left: 10px;" class="ti ti-eye"></i>
                                                </a> -->
                                                <a onclick="return confirm('Are you sure to delete Category?')" href="{{ url('category/delete_category/'.$category_row->id) }}">
                                                    <i style="font-size: 22px;margin-left: 10px;" class="ti ti-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection