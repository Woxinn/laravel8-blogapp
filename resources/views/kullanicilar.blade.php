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
                <form action="{{route('kullanicilar.update',$kullaniciid)}}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="kulyetki" class="custom-select" id="">
                        <option @if (App\Models\User::where('id',$kullaniciid)->first()->yetki == 'kullanici')
                            selected
                        @endif value="kullanici">Kullanıcı</option>
                        <option @if (App\Models\User::where('id',$kullaniciid)->first()->yetki == 'admin')
                            selected
                        @endif value="admin">Admin</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary">Düzenle</button>
                </form>
                @endif
                @else
               
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Email</th>
                            <th>Yetki</th>
                            <th>İşlem</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kullanicilar as $kullanici)
                        <tr>
                            <th scope="row"> {{ $kullanici->id }} </th>
                            <td> {{ $kullanici->name }} </td>
                            <td> {{ $kullanici->email }} </td>
                            <td> {{ $kullanici->yetki }} </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{route('kullanicilar.edit',$kullanici->id)}}" class="btn btn-sm btn-warning">Düzenle</a>
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