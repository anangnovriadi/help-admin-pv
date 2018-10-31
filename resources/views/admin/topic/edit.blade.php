@extends('admin.layout.app')

@section('pageTitle', 'Dashboard')

@section('content')

<div id="main-wrapper">
    @include('admin.layout.header')
    @include('admin.layout.sidebar')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Topic</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                    <li class="breadcrumb-item active">Topic</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Edit Topic</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.topic', $topic->id ) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="form-body">
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Topic Name</label>
                                                <input type="text" name="name_topic" class="form-control" value="{{ $topic->name_topic }}" placeholder="Enter Your Topic Name">
                                                @if($errors->first('name_topic'))
                                                    <div class="mb-3">
                                                        <small class="form-control-feedback">{{ $errors->first('name_topic') }}</small>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category</label>
                                                <select name="category_id" class="form-control custom-select">
                                                    @foreach($category as $categories)
                                                        <option value="{{ $categories->id }}" @if($categories->id == $topic->category_id) selected @endif>{{ $categories->name_category }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->first('category_id'))
                                                    <div class="mb-3">
                                                        <small class="form-control-feedback">{{ $errors->first('category_id') }}</small>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="card-title">Tag Name</label>
                                            <div class="tags-default">
                                                <input type="text" name="tag_name" value="{{ $topic->tag_name }}" data-role="tagsinput" placeholder="add tags" /> 
                                                @if($errors->first('tag_name'))
                                                    <div class="mb-3">
                                                        <small class="form-control-feedback">{{ $errors->first('tag_name') }}</small>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="row p-t-20">
                                        <div class="col-12">
                                            <label class="card-title">Description Topic</label>
                                            <div class="form-group">
                                                <textarea class="textarea_editor form-control" name="description" rows="15" placeholder="Enter text ...">{{ $topic->description }}</textarea>
                                                @if($errors->first('description'))
                                                    <div class="mb-3">
                                                        <small class="form-control-feedback">{{ $errors->first('description') }}</small>
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
@section('add_js')

<script src="{{ asset('admin/plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('admin/plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.textarea_editor').wysihtml5();
    });
</script>

@endsection

@endsection
