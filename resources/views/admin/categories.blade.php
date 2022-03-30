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
                            <x-breadcrumb></x-breadcrumb>
                        </div>
                    </div>
                </div>
                <div class="mb-30">
                    <div class="pb-20">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="sitemap">
                                    <h5 class="h5">Categories</h5>
                                    <x-category-tree-component :categories="$categories"></x-category-tree-component>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
