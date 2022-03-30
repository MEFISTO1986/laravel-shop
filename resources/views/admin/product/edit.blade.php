@extends('admin.layout')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>{{ __("Edit") }} {{ $product->name }}</h4>
                            </div>
                            <x-breadcrumb></x-breadcrumb>
                        </div>
                    </div>
                </div>
                <div class="mb-30">
                    <div class="pb-20">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h5 class="h5">Product edit</h5>
                                <div class="pd-20 card-box mb-30">
                                    <form method="POST" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <label>Название</label>
                                            <input class="form-control" type="text" @isset($product) value="{{ $product->name }}" @endisset name="name">
                                            @error('name')
                                                <div class="form-control-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('code') has-danger @enderror">
                                            <label>Код</label>
                                            <input class="form-control" type="text" @isset($product) value="{{ $product->code }}" @else value="{{ old('code') }}" @endisset name="code">
                                            @error('code')
                                            <div class="form-control-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Описание</label>
                                            <textarea class="form-control" name="description">@isset($product) {{ $product->description }} @endisset</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Родительская категория</label>
                                            <select name="category_id" class="form-control">
                                                <option value="">Выберите категорию</option>
                                                @foreach($categories as $id => $name)
                                                    <option @if($product->category_id == $id) selected @endif value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group @error('price') has-danger @enderror">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                <span class="input-group-btn input-group-prepend">
                                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                                                </span>
                                                <span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                                    <span class="input-group-text">{{ $currency->symbol }}</span>
                                                </span>
                                                <input id="demo2" type="text" value="{{ $product->getPriceNumber() }}" name="price" class="form-control">
                                                @error('price')
                                                <div class="form-control-feedback">{{ $message }}</div>
                                                @enderror
                                                <span class="input-group-btn input-group-append">
                                                    <button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Картинка</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">Выберите файл</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if($product->image)
                                                <img width="100" height="100" src="{{ Storage::url($product->image) }}" alt="">
                                            @endisset
                                        </div>
                                        <button class="btn btn-primary" type="submit">Обновить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
