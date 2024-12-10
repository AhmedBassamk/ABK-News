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
                        <h4 class="card-title">Add New Category</h4>
                        <p class="card-description">
                            Add New Category In Mag News
                        </p>
                        <form action="{{ route('submitCategory') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                            @csrf
                          <div class="d-flex">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Name in english</label>
                                <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control @error('name_en') is-invalid @enderror" id="exampleInputName1" placeholder="Name">
                                @error('name_en')
                                    <div class="invalid-feedback" style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Name in arabic</label>
                                <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control @error('name_ar') is-invalid @enderror" id="exampleInputName1" placeholder="Name">
                                @error('name_ar')
                                    <div class="invalid-feedback" style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>

                            <div class="form-group col-md-12">
                                <label>Image upload</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback" style="color: red;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex">
                                <div class="form-group col-md-6">
                                    <label for="exampleTextarea1">Description in english</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror" name="description_en" id="exampleTextarea1" placeholder="Description" rows="4">{{ old('description_en') }}</textarea>
                                    @error('description_en')
                                        <div class="invalid-feedback" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleTextarea1">Description in arabic</label>
                                    <textarea class="form-control @error('description_ar') is-invalid @enderror" name="description_ar" id="exampleTextarea1" placeholder="Description" rows="4">{{ old('description_ar') }}</textarea>
                                    @error('description_ar')
                                        <div class="invalid-feedback" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group __show d-none">
                                <label for="exampleFormControlSelect2">Parent Category</label>
                                <select class="form-control" disabled name="parent_id" id="sele">
                                    @foreach ($parent_categories as $pc)
                                        <option value="{{ $pc->id }}">{{ $pc->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('categoryShow') }}" class="btn btn-light">Show Categories</a>
                            <button type="button" id="show" class="btn btn-info mr-2">Sub Category</button>
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
    $('#show').click(()=>{
        $('.__show').toggleClass('d-none');
        $('#sele').prop('disabled' , false);
    });
</script>
@endsection
