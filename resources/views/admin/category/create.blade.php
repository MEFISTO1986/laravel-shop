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
                                <h5 class="h5">Category add</h5>
                                <div class="pd-20 card-box mb-30">
                                    <form method="POST" action="@isset($category){{ route('category.update', $category) }}@else{{ route('category.store') }}@endisset" enctype="multipart/form-data">
                                        @csrf
                                        @isset($category)
                                            @method('PUT')
                                        @endisset
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <label>Название</label>
                                            <input class="form-control" type="text" @isset($category) value="{{ $category->name }}" @endisset name="name">
                                            @error('name')
                                                <div class="form-control-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('code') has-danger @enderror">
                                            <label>Код</label>
                                            <input class="form-control" type="text" @isset($category) value="{{ $category->code }}" @else value="{{ old('code') }}" @endisset name="code">
                                            @error('code')
                                            <div class="form-control-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Описание</label>
                                            <textarea class="form-control" name="description">@isset($category) {{ $category->description }} @endisset</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Родительская категория</label>
                                            <select name="parent_id" class="form-control">
                                                <option value="">Выберите категорию</option>
                                                @foreach($categories as $id => $name)
                                                    <option @if($category && $category->parent_id == $id) selected @endif value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Картинка</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">Выберите файл</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if($category && $category->image)
                                                <img width="200" height="200" src="{{ Storage::url($category->image) }}" alt="">
                                            @endisset
                                        </div>
                                        <button class="btn btn-primary" type="submit">@isset($category)Обновить@elseСоздать@endisset</button>
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
