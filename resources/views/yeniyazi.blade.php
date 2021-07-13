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
                <form action="{{route('yaziekle')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Başlığı</label>
                            <input type="text" name="yazibaslik" class="form-control" id="baslik" value="{{ old('yazibaslik') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="kategori">Yazı Kategorisi</label>
                            <select id="kategori" name="yazikategori" class="wide">
                                <option disable value="">Seçiniz</option>
                                @foreach(App\Models\Kategoriler::all() as $kategori)
                                <option value="{{$kategori->id}}" @if (old('yazikategori') == $kategori->id)
                                    selected
                                    @endif > {{ $kategori->ad }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="kategori">Yazı Fotoğrafı</label>
                            <input type="file" name="file" class="form-control" value="{{old('file')}}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Etiketleri</label>
                            <input type="text" name="yazietiketler" class="form-control" id="etiketler" value="{{ old('yazietiketler') }}">
                            <small>Birden fazla etiket için " , " kullanınız.</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Öne Çıkarılsın Mı?</label>
                            <select class="wide" name="yazionecikarilmis" id="onecikarilmis">
                                <option value="">Seçiniz</option>
                                <option value="1">Evet</option>
                                <option value="0">Hayır</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-10">
                            <label for="mytextare">İçerik</label>
                            <textarea name="yaziicerik" id="mytextarea">{{ old('yaziicerik') }}</textarea>
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