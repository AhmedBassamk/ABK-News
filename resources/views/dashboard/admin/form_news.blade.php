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
                            <h4 class="card-title">Add New News</h4>
                            <p class="card-description">
                                Add New News In Mag News
                            </p>
                            <form action="{{ route('adminsAddSubmit') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputName1">Admin Name</label>
                                    <input type="text" name="admin_name" class="form-control @error('admin_name') is-invalid @enderror" id="exampleInputName1" placeholder="Name">
                                    @error('admin_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Admin Email</label>
                                    <input type="email" name="admin_email" class="form-control @error('admin_email') is-invalid @enderror" id="exampleInputName1" placeholder="Name">
                                    @error('admin_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Image Upload</label>
                                    <input type="file" name="admin_image" class="file-upload-default @error('admin_image') is-invalid @enderror">
                                    <div class="input-group col-xs-12">
                                        <span class="input-group-append position-absolute" style="left: -3px">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                        <input type="file" name="admin_image" class="form-control  @error('admin_image') is-invalid @enderror file-upload-info w-100" placeholder="Upload Image">
                                    </div>
                                    @error('admin_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                    <div class="form-group">
                                        <label for="exampleTextarea1">Admin Number Phone</label>
                                        <input type="number" name="admin_number" class="form-control @error('admin_number') is-invalid @enderror w-100" placeholder="Upload Image">
                                        @error('admin_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea1">Admin Password</label>
                                        <input type="password" name="admin_password" class="form-control @error('password') is-invalid @enderror w-100" placeholder="Upload Image">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>



                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a class="btn btn-light">Show Admins</a>
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
