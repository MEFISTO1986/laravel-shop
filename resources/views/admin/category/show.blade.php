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
                                <h5 class="h5">Category {{ $category->name }}</h5>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Название</td>
                                        <td>{{ $category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Описание</td>
                                        <td>{{ $category->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Код</td>
                                        <td>{{ $category->code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Картинка</td>
                                        <td>
                                            @if($category->image)
                                                <img width="200" height="200" src="{{ Storage::url($category->image) }}" alt="">
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ссылка</td>
                                        <td>
                                            <a href="{{ $url }}">{{ $url }}</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
