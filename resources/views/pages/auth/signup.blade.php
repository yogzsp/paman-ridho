@extends("layouts.polos")

@section("content")
    <div class="d-flex w-100 h-100 justify-content-center align-items-center bg-secondary">
        <div class="card z-index-0">
            @if(session('success'))
              <div class="alert alert-success m-0">
                Akun sukses di bikin
              </div>
            @endif
            @if(session('error'))
              <div class="alert alert-danger m-0">
                {{ session('error') }}
              </div>
            @endif
            <div class="card-header text-center pt-4 bg-primary text-white fw-bold frus">
              <h5>Register Account</h5>
            </div>
            <div class="card-body m-3 fpop fw-900">
              <form role="form" method="POST" action="{{route("create-account")}}">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password">
                </div>
                <div class="form-check form-check-info text-start">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked="">
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-primary text-white fw-bold w-100 my-4 mb-2">Sign up</button>
                </div>
              </form>
            </div>
          </div>
    </div>
@endsection