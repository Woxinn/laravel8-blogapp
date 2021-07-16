@extends('layouts.app')
@section('baslik','Admin')

@section('ekstracss')
<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


@endsection

@section('icerik')

<section>
    <div style="margin-left:10%;">
        <div class="row">
            @include('layouts.adminmenu')
            <div class="col-md-9">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                   {{__('messages.'.session('status'))}}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all(); as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <label for="title">Yazı Başlığı</label>
                            <input type="text" name="postTitle" class="form-control" id="baslik" value="{{ old('postTitle') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="category">Yazı Kategorisi</label>
                            <select id="category" name="postCategory" class="wide">
                                <option disable value="">Seçiniz</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if (old('postCategory') == $category->id)
                                    selected
                                    @endif > {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="kategori">Yazı Fotoğrafı</label>
                            <input type="file" name="postImage" class="form-control" value="{{old('postImage')}}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Etiketleri</label>
                            <input type="text" name="postTags" class="form-control" id="tags" value="{{ old('postTags') }}">
                            <small>Birden fazla etiket için " , " kullanınız.</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Öne Çıkarılsın Mı?</label>
                            <select class="wide" name="postFeatured" id="featured">
                                <option disabled value="">Seçiniz</option>
                                <option {{ old('postFeatured') == 1 ?: 'selected' }} value="1">Evet</option>
                                <option {{ old('postFeatured') == 0 ?: 'selected' }} value="0">Hayır</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-10">
                            <label for="mytextare">İçerik</label>
                            <textarea name="postContent" id="content">{{ old('postContent') }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <input type="submit" class="btn btn-lg btn-success" value="Yazı Ekle">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection