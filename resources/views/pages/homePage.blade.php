@extends("layouts.index")

@section("title")
    Yogi
@endsection

@section("content")
    <div class="w-100 bg-dark h-75 background position-absolute" style="background-image: url('{{asset("images/bg1.png")}}');z-index:-1;"></div>
    <div class="title-background container text-white w-100 h-50 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="mb-2" style="font-size:90px;">DAHLIA FAMILY HOUSE</h1>
            <p style="font-size:25px;">Crafting Unforgettable Moments.</p>
        </div>
    </div>
    <div class="list-menu container">
        <div class="row row-cols-2">
            <div class="col mb-5">
                <x-list-menu-1 images="{{ asset('images/Assets/kursi.jpg') }}">
                    Guest House
                </x-list-menu-1>
            </div>
            <div class="col mb-5">
                <x-list-menu-1 images="{{ asset('images/Assets/kursi.jpg') }}">
                    Guest House
                </x-list-menu-1>
            </div>
            <div class="col mb-5">
                <x-list-menu-1 images="{{ asset('images/Assets/kursi.jpg') }}">
                    Guest House
                </x-list-menu-1>
            </div>
            <div class="col mb-5">
                <x-list-menu-1 images="{{ asset('images/Assets/kursi.jpg') }}">
                    Guest House
                </x-list-menu-1>
            </div>
        </div>
    </div>
@endsection