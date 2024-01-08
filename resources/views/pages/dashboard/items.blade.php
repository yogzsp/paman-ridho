@extends("layouts.dashboard")
@section("title-page")
Menu Page
@endsection
@section("content")
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between align-items-center">
              <h6>List Kategori</h6>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                Add Item
              </button>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gambar Items</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($items as $index => $item)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$index+1}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="img-menu background rounded" style="overflow: hidden; height:240px;width:68%; background-image:url('{{asset("images/uploads/".$item->images)}}')"></div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$item->name}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$item->price}}</p>
                      </td>
                      <td class="align-middle text-center">
                        <ul class="d-flex list-unstyled justify-content-center">
                          <li>
                            <a href="javascript:;" class="me-3 text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit">
                              Edit
                            </a>
                          </li>
                          <li>
                            <a href="{{route("del-item",['id'=>$item->id])}}" class="me-3 text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Hapus">
                              Hapus
                            </a>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- end table --}}
  </div>

  <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Menambahkan Item</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route("tambah-item")}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="mb-3">
                <label for="listKategori" class="form-label">Pilih Kategori</label>
                <div class="input-group mb-3">
                  <select class="form-select" id="listKategori" name="cat">
                    @foreach($cats as $cat)
                      <option value="{{$cat->id}}">{{$cat->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label for="formNama" class="form-label">Nama Item</label>
                <input type="text" class="form-control" id="formNama" aria-describedby="helpFormNama" name="name">
                <div id="helpFormNama" class="form-text">Masukan nama dari Item ini.</div>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Masukan harga</label>
                <div class="input-group mb-3" id="price">
                  <span class="input-group-text">Rp. </span>
                  <input type="text" class="form-control" aria-label="Masukan harganya" name="price">
                </div>
              </div>
              <div class="mb-3">
                <label for="gambarFile" class="form-label">Masukan Gambar</label>
                <div class="input-group">
                  <input type="file" class="form-control" id="gambarFile" aria-describedby="inputGroupFileAddon04" aria-label="Upload Gambar" accept="image/*" name="image">
                </div>
                <div id="helpFile" class="form-text">Masukan gambar yang sesuai.</div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection