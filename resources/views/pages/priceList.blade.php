@extends("layouts.index")

@section("title")
Dahlia Family House
@endsection

@section("content")
<div class="title-background background text-white w-100 h-75 d-flex align-items-center justify-content-center" style="background-image: url('{{asset("images/bg2.png")}}');" id="home">
    <div class="text-center" style="text-shadow: 1px 2px 3px rgb(0,0,0,0.8);">
        <h1 class="mb-1" style="font-size:90px;">PRICE LIST</h1>
        <p style="font-size:25px;">Daftar harga sewa peralatan lengkap untuk berbagai macam acara.</p>
        <a href="https://wa.me/6287756145323/?text=Hi+saya+tertarik+untuk+berbelanja+disini!" target="__blank">
            <div class="btn btn-wa fs-3 fs-bold text-light mt-3" >
                <img src="{{asset('images/icons/whatsapp.webp')}}" width="50px">
                Chat Sekarang
            </div>
        </a>
    </div>
</div>

<div class="list-item w-100 my-5" id="price">
    <div class="list-menu w-100 d-flex justify-content-center">
        <ul class="list-group list-group-horizontal mx-2 hide-scroll" style="overflow-x:scroll;">
            @foreach($kategoris as $kategori => $items) 
                @if(count($items) > 0)
                    <li class="list-group-item p-0 border-dark fw-bold abu">
                        <button class="nav-link px-4 py-2 text-nowrap" data-bs-toggle="tab" data-bs-target="#{{$kategori}}">{{$kategori}}</button>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
<div class="item-select w-100 tab-content">
    {{-- kursi --}}
    @foreach($kategoris as $kategori => $items)
        @if(count($items) > 0)
            <div class="w-100 h-50  py-3 tab-pane fade active show text-center" id="{{$kategori}}">
                <h1 class="text-uppercase mb-4 fw-bold">{{$kategori}}</h1>
                <div class="list-menu row row-cols-md-4 row-cols-sm-2 p-2 d-flex justify-content-center">
                    @foreach($items as $item)
                        <div class="col d-flex justify-content-center align-items-center">
                            <x-list-menu-2 image="{{ asset('images/uploads/'.$item->images) }}" title="{{$item->name}}" price="Rp. {{$item->price}}/unit"></x-list-menu-2>
                        </div>
                    @endforeach
                </div>
                <a href="https://wa.me/6287756145323/?text=Hi+saya+ingin+membeli+{{$kategori}}" target="__blank">
                    <div class="btn btn-wa fs-5 fs-bold text-light mt-2 px-4 py-2 fw-bold" style="border:solid 1px #4B4B4B;">
                        <img src="{{asset('images/icons/whatsapp.webp')}}" width="30px">
                        Sewa <span style="color:#4B4B4B;">{{$kategori}}</span> Sekarang
                    </div>
                </a>
            </div>
        @endif
    @endforeach
    
</div>
@endsection