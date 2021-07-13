@extends('layouts.app')
@section('baslik','Admin')

@section('icerik')

<section>
    <div style="margin-left:10%;">
        <div class="row">
            @include('layouts.adminmenu')
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card  bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-white text-center">Toplam Yazı</h5>
                                <h2 class="card-text text-white text-center">{{ App\Models\Yazilarmodel::all()->count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card  bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-white text-center">Toplam Üye</h5>
                                <h2 class="card-text text-white text-center">{{ App\Models\User::all()->count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card  bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-white text-center">Toplam Yorum</h5>
                                <h2 class="card-text text-white text-center">{{ App\Models\Yorumlarmodel::all()->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection