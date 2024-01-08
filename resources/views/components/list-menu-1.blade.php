<div class="rounded list-item bg-light shadow pb-2" style="width: 600px;overflow:hidden;">
    <div class="list-image background" class="w-100 d-flex justify-content-center align-items-center" style="overflow: hidden; height:500px; background-image:url('{{ $images }}')">
        
    </div>
    <div class="list-desc p-2 d-block fw-bold">
        <p class="m-0 text-uppercase">
            {{$slot}}
        </p>
        <a href="#" class="float-end text-decoration-none text-danger">
            Details > 
        </a>
    </div>
</div>