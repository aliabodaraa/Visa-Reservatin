@extends('layouts.app-master')

@section('content')

<section class="h-100 gradient-custom-2">
    <div class="py-2 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-9">
          <div class="card" style="font-size: 20px;border: 1px solid #42b19a;">
            <div class="rounded-top text-white d-flex flex-row" style="background-color: #42b19a; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                  style="width: 150px; z-index: 1">
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                  style="width: 150px; z-index: 1">
                  @if($user->id == auth()->user()->id)
                    <a href={{ route("dashboard.users.edit",[$user->id]) }} type="button" class="btn btn-outline-dark mb-1" data-mdb-ripple-color="dark"
                        style="z-index: 1;">
                        Edit profile
                    </a>
                  @endif

              </div>
              <div class="ms-3" style="margin-top: 100px;">
                <h5>{{ $user->username }}</h5>
              </div>
            </div>
            <div class="ms-3" style="margin-top: 100px;">
              <h5>{{ $user->email }}</h5>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>

  @endsection