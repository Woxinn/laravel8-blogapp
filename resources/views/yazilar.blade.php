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
                @if (session('mesaj'))
                <div class="alert alert-success" role="alert">
                    {{session('mesaj')}}
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
                    <a href="{{route('yeniyazi')}}" class="btn btn-primary">Yeni Yazı Ekle</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">İçerik</th>
                            <th scope="col">Okunma Sayısı</th>
                            <th scope="col">Yorum Sayısı</th>
                            <th scope="col">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($yazilar as $yazi)
                        <tr>
                            <th scope="row">{{$yazi->id}}</th>
                            <td>{{ $yazi->baslik }}</td>
                            <td>{{ Str::limit($yazi->icerik,15) }}</td>
                            <td>{{ $yazi->okunmasayisi }}</td>
                            <td> {{ $yazi->yorumlar->count() }} </td>
                            <td>
                                <form action="{{route('onecikar',$yazi->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="onecikarilmis" value="{{ $yazi->onecikarilmis === '1' ? '0' : '1' }}">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="{{ $yazi->onecikarilmis === '1' ? 'fas' : 'far' }} fa-star"></i></button>
                                </form>
                                <a href="{{ route('yaziduzenle',$yazi->id) }}" class="btn btn-sm btn-warning">Yazıyı Düzenle</a>
                                <form action="{{route('yazisil',$yazi->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger mt-2">Yazıyı Sil</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $yazilar->links() }}
            </div>
        </div>
    </div>
</section>

@endsection