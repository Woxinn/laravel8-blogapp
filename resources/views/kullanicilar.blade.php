@extends('layouts.app')
@section('baslik','Admin')

@section('icerik')

<section>
    <div style="margin-left:10%;">
        <div class="row">
            @include('layouts.adminmenu')
            <div class="col-md-8">
                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ __('messages.'.session('status')) }}
                </div>
                @endif
               @isset($edit)
                @if ($edit==1)
                    <div class="d-flex">
                    <form action="{{route('users.update',$user->id)}}" method="post">
                    <div class="row">
                    @csrf                        
                    @method('PUT')
                    </div>
                    <div class="row">                        
                        <div class="col-md-6">
                            
                    <select name="kulyetki" class="custom-select" id="">
                        <option @if ($user->yetki == 'kullanici')
                            selected
                        @endif value="kullanici">Kullanıcı</option>
                        <option @if ($user->yetki == 'admin')
                            selected
                        @endif value="admin">Admin</option>
                    </select>
                        </div>
                        <div class="col-md-6">
                            
                    <button type="submit" class="btn btn-sm btn-primary">Düzenle</button>
                        </div>
                    </div>
                </form>
                    </div>
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
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row"> {{ $user->id }} </th>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td> {{ $user->yetki }} </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-warning">Düzenle</a>
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