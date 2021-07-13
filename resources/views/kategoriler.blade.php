@extends('layouts.app')
@section('baslik','Admin')


@section('icerik')

<section>
    <div style="margin-left:10%;">
        <div class="row">
            @include('layouts.adminmenu')
            <div class="col-md-8">
                @if(session('mesaj'))
                <div class="alert alert-success" role="alert">
                    {{ session('mesaj') }}
                </div>
                @endif
                @isset($duzenleme)
                @if ($duzenleme==1)
                <form action="{{route('kategoriler.update',$kategoriid)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control col-md-4" name="yeniad" value="{{$kategoriad->ad}}">
                    <button type="submit" class="btn btn-sm btn-primary">Düzenle</button>
                </form>
                @endif
                @else

                <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#kategorieklemodal">Kategori Ekle</button>

                <!-- Modal -->
                <div class="modal fade" id="kategorieklemodal" tabindex="-1" aria-labelledby="modalbody" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalbody">Kategori Ekle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('kategoriler.store')}}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <input type="text" name="kategoriad" class="form-control" id="ad">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <input class="btn btn-success" type="submit" value="Ekle">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ad</th>
                            <th scope="col">Uzantı</th>
                            <th>İşlem</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoriler as $kategori)
                        <tr>
                            <th scope="row"> {{ $kategori->id }} </th>
                            <td> {{ $kategori->ad }} </td>
                            <td> {{ $kategori->slug }} </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{route('kategoriler.edit',$kategori->id)}}" class="btn btn-sm btn-warning">Düzenle</a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{route('kategoriler.destroy',$kategori->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endisset

            </div>
        </div>
    </div>
</section>
@endsection