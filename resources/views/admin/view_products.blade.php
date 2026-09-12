@extends('layouts.admin')

@section('content')
<div class="m-3">
    <button class="btn btn-primary" onclick="window.location.href='{{ route('admin_editUser',[$user->id])}}'"><i
            class="bi bi-house"></i>
        Back </button>
</div>
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-12">
            <div class="row">
                @foreach ($photoPaths as $photos)
                <div class="col col-xl-4 col-md-6 col-sm-12">
                    <!-- Default Card -->
                    <div class="card">
                        <div class="card-body p-3">
                            <img src="{{asset('storage/'.$photos)}}" class="img-fluid" alt="">
                        </div>
                    </div><!-- End Default Card -->
                </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
@endsection