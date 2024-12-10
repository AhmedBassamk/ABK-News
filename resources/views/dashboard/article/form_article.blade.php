@extends('master')
@section('content')
@section('style')
    <style>
        .alert_ {
            padding: 13px 10px;
            background: #4B49AC;
            box-shadow: 0 0 10px gray;
            width: 280px;
            border-radius: 3px;
            position: absolute;
            right: 40px;
            z-index: 111;
            top: 110px;
        }

        .alert_ p {
            font-size: bold;
            color: white;
            margin: 0;
        }
    </style>
@endsection
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                @if (session('message'))
                <div class="alert_">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Article</h4>
                            <p class="card-description">
                                Add New article In Mag News
                            </p>
                            <form action="{{ route('submitArticle') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                @csrf
                                <div class="d-flex">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">Titel in english</label>
                                        <input type="text" name="title_en" class="form-control @error('title') is-invalid @enderror" id="exampleInputName1" placeholder="Name">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">Titel in arabic</label>
                                        <input type="text" name="title_ar" class="form-control @error('title') is-invalid @enderror" id="exampleInputName1" placeholder="Name">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   </div>

                                <div class="form-group">
                                    <label>Image Upload</label>
                                    <input type="file" name="image" class="file-upload-default @error('image') is-invalid @enderror">
                                    <div class="input-group col-xs-12">
                                        <span class="input-group-append position-absolute" style="left: -3px">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                        <input type="file" name="image" class="form-control file-upload-info w-100" placeholder="Upload Image">
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex">
                                    <div class="form-group col-md-6">
                                        <label for="exampleTextarea1">Description in english</label>
                                        <textarea class="form-control @error('description_en') is-invalid @enderror" name="description_en" id="exampleTextarea1" placeholder="Description" rows="4"></textarea>
                                        @error('description_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleTextarea1">Description in arabic</label>
                                        <textarea class="form-control @error('description_ar') is-invalid @enderror" name="description_ar" id="exampleTextarea1" placeholder="Description" rows="4"></textarea>
                                        @error('description_ar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                             <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a class="btn btn-light">Show Articles</a>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a
                        href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
                    BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                        class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
@endsection
@section('script')
<script>
    $('.alert_').fadeOut(4000)
</script>
@endsection
