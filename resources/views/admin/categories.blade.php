@extends('admin.layout')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Categories</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="mb-30">
                    <div class="pb-20">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="sitemap">
                                    <h5 class="h5">Categories</h5>
                                    <ul>
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="#">{{ $category['name'] }}</a>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item" href="#"><i class="dw dw-add"></i> Add</a>
                                                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($category['childs'])
                                                <li class="child">
                                                    <ul>
                                                        @foreach($category['childs'] as $child)
                                                            <li>
                                                                <a href="#">{{ $child['name'] }}</a>
                                                                <div class="dropdown">
                                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                                        <i class="dw dw-more"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                                        <a class="dropdown-item" href="#"><i class="dw dw-add"></i> Add</a>
                                                                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                                                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
