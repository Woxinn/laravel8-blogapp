<style>
    .adminlistesi {
        font-size: 30px;
        font-family: 'Roboto', sans-serif;
        font-weight: 800;
    }

    a {
        display: block;
        position: relative;
        padding: 0.2em 0;
    }

    /* Fade in */
    a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0.1em;
        background-color: hotpink;
        opacity: 0;
        transition: opacity 300ms, transform 300ms;
    }

    a:hover::after,
    a:focus::after {
        opacity: 1;
        transform: translate3d(0, 0.2em, 0);
    }

    .listeli {
        color: gray;
    }

    .aktifsayfa {
        color: black;
    }
</style>

<div class="col-md-3">
    <ul class="adminlistesi">
        <li><a class="listeli" href="/admin">Kontrol Paneli</a></li>
        <li><a class="listeli" href="/admin/yeniyazi">Yeni Yazı</a></li>
        <li><a class="listeli" href="/admin/kategoriler">Kategoriler</a></li>
        <li><a class="listeli" href="/admin/yazilar">Yazılar</a></li>
        <li><a class="listeli" href="/admin/kullanicilar">Kullanıcılar</a></li>
        <li><a class="listeli" href="/admin/ayarlar">Ayarlar</a></li>
    </ul>
</div>

@section('ekstrajs')
@parent
<script>
    $(window).on("load", function() {
        var list = document.querySelectorAll("a[href='" + window.location.pathname + "']");
        list[0].classList.add('aktifsayfa');
    });
</script>
@endsection