@extends('admin.layout.app')

@section('pageTitle', 'Dashboard')

@section('content')

<div id="main-wrapper">
    @include('admin.layout.header')
    @include('admin.layout.sidebar')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Category</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Add</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Add Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.category', $category->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="form-body">
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category Name</label>
                                                <input type="text" name="name_category" value="{{ $category->name_category }}" class="form-control" placeholder="Enter Your Category Name">
                                                @if($errors->first('name_category'))
                                                    <div class="mb-3">
                                                        <small class="form-control-feedback">{{ $errors->first('name_category') }}</small>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
</div>

@endsection