@extends('layouts.app')
@section('baslik','Admin')


@section('icerik')

<section>
    <div style="margin-left:10%;">
        <div class="row">
            @include('layouts.adminmenu')
            <div class="col-md-9">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                   {{ __('messages.'.session('status')) }}
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
                <form action="{{route('posts.update',$post)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Başlığı</label>
                            <input type="text" name="postTitle" class="form-control" id="title" value="{{ old('postTitle') ? old('postTitle') : $post->title }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="kategori">Yazı Kategorisi</label>
                            <select id="category" name="postCategory" class="wide" style="display: none;">
                                <option disable value="">Seçiniz</option>
                                @foreach(App\Models\Category::all() as $category)
                                <option value="{{$category->id}}" {{ old('postCategory') ? (old('postCategory') === $category->id ? 'selected' : '') : ($post->category_id === $category->id ? 'selected' : '') }} > {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="kategori">Yazı Fotoğrafı</label>
                            <input type="file" name="postImage" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <img class="col-md-5" src="../../../../images/{{$post->image}}" alt="">
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Etiketleri</label>
                            <input type="text" name="postTags" class="form-control" id="tags" value="{{ old('postTags') ? old('postTags') : $post->tags }}">
                            <small>Birden fazla etiket için " , " kullanınız.</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Öne Çıkarılsın Mı?</label>
                            <select class="wide" name="postFeatured" id="featured">
                                <option value="">Seçiniz</option>
                                <option {{ old('postFeatured') ? (old('postFeatured') === '1' ? 'selected' : '') : ($post->featured === '1' ? 'selected' : '') }} value="1">Evet</option>
                                <option {{ old('postFeatured') ? (old('postFeatured') === '0' ? 'selected' : '') : ($post->featured === '0' ? 'selected' : '') }} value="0">Hayır</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-10">
                            <label for="mytextare">İçerik</label>
                            <textarea name="postContent" id="mytextarea">{{ old('postContent') ? old('postContent') : $post->content }}</textarea>
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