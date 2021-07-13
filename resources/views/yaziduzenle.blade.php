@extends('layouts.app')
@section('baslik','Admin')


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
                <form action="{{route('yaziguncelle',$yazi->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Başlığı</label>
                            <input type="text" name="yazibaslik" class="form-control" id="baslik" value="{{ old('yazibaslik') ? old('yazibaslik') : $yazi->baslik }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="kategori">Yazı Kategorisi</label>
                            <select id="kategori" name="yazikategori" class="wide" style="display: none;">
                                <option disable value="">Seçiniz</option>
                                @foreach(App\Models\Kategoriler::all() as $kategori)
                                <option value="{{$kategori->id}}" {{ old('yazibaslik') ? (old('yazibaslik') === $kategori->id ? 'selected' : '') : ($yazi->kategoriid === $kategori->id ? 'selected' : '') }} > {{ $kategori->ad }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="kategori">Yazı Fotoğrafı</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <img class="col-md-5" src="../../images/{{$yazi->resim}}" alt="">
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Etiketleri</label>
                            <input type="text" name="yazietiketler" class="form-control" id="etiketler" value="{{ old('yazietiketler') ? old('yazietiketler') : $yazi->etiketler }}">
                            <small>Birden fazla etiket için " , " kullanınız.</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <label for="baslik">Yazı Öne Çıkarılsın Mı?</label>
                            <select class="wide" name="yazionecikarilmis" id="onecikarilmis">
                                <option value="">Seçiniz</option>
                                <option {{ old('yazionecikarilmis') ? (old('yazionecikarilmis') === '1' ? 'selected' : '') : ($yazi->onecikarilmis === '1' ? 'selected' : '') }} value="1">Evet</option>
                                <option {{ old('yazionecikarilmis') ? (old('yazionecikarilmis') === '0' ? 'selected' : '') : ($yazi->onecikarilmis === '0' ? 'selected' : '') }} value="0">Hayır</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-10">
                            <label for="mytextare">İçerik</label>
                            <textarea name="yaziicerik" id="mytextarea">{{ old('yaziicerik') ? old('yaziicerik') : $yazi->icerik }}</textarea>
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