@extends('layouts.backapp')
@section('backend_content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                     <div class="card">
                            <div class="card-header">
                               <h5>All Sub Category</h5>
                                <a class="btn btn-primary float-right" href="{{ url('subcategory/add_sub_category') }}">Add Sub Category</a>
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
                                            <th>Category Id</th>
                                            <th>Sub Category name</th>
                                            <th>Status</th>
                                            <th>Created date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($sub_category_data as $sub_category_row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $sub_category_row->category_name }}</td>
                                            <td>{{ $sub_category_row->sub_category_name }}</td>
                                            <td>

                                                @if($sub_category_row->status == 1) 
                                                <div class="label-main">
                                                    <label class="label label-success">Active</label>
                                                </div>
                                                @else
                                                <div class="label-main">
                                                    <label class="label label-danger">Inactive</label>
                                                </div>
                                                @endif

                                            </td>

                                            <td>{{ $sub_category_row->created_at }}</td>
                                            <td>
                                                <a href="{{ url('subcategory/edit_sub_category/'.$sub_category_row->id) }}">
                                                    <i style="font-size: 22px;" class="ti ti-pencil-alt"></i>
                                                </a>
                                                <!-- <a href="">
                                                    <i style="font-size: 22px;margin-left: 10px;" class="ti ti-eye"></i>
                                                </a> -->
                                                <a onclick="return confirm('Are you sure to delete Sub Category?')" href="{{ url('subcategory/delete_sub_category/'.$sub_category_row->id) }}">
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