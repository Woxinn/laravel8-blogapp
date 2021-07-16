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
                <div class="float-right mr-3 mb-2">
                    <a href="{{route('posts.create')}}" class="btn btn-primary">Yeni Yazı Ekle</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Resim</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">İçerik</th>
                            <th scope="col">Okunma Sayısı</th>
                            <th scope="col">Yorum Sayısı</th>
                            <th scope="col">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <th><img style="max-width: 70px;" src="../../images/{{$post->image}}" alt=""></th>
                            <td><b>{{ $post->title }}</b></td>
                            <td>{{ Str::limit($post->content,15) }}</td>
                            <td>{{ $post->hit }}</td>
                            <td> {{ $post->comments->count() }} </td>
                            <td>
                                <form action="{{route('posts.featuredUpdate',$post->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="featured" value="{{ $post->featured == '1' ? '0' : '1' }}">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="{{ $post->featured == '1' ? 'fas' : 'far' }} fa-star"></i></button>
                                </form>
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-warning mt-2">Yazıyı Düzenle</a>
                                <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger mt-2">Yazıyı Sil</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</section>

@endsection