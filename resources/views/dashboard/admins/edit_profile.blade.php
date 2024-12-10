@extends('master')
@section('content')
    <style>
        body {}

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: #4B49AC;
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #4B49AC;
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }

        .modal_,
        .modal_2 {
            position: fixed;
            width: 40%;
            padding: 45px;
            top: 20%;
            height: 350px;
            left: 30%;
            background: white;
            box-shadow: 0 0 10px gray;
            border-radius: 15px;
            z-index: 1;
        }

        .modal_2 {
            position: fixed;
            width: 40%;
            padding: 45px;
            top: 20%;
            height: fit-content;
            left: 30%;
            background: white;
            box-shadow: 0 0 10px gray;
            border-radius: 15px;
            z-index: 1;
        }

        .hide {
            display: none;
        }
    </style>
    {{-- verifiycation modal --}}
    <div class="modal_ hide">
        <div class="titleModal border-bottom">
            <h3>Verification Code</h3>
        </div>
        <div class="bodyMo">
            <p class="text-danger mt-4 text-center">Please type the code in the verification field so you can change the
                password</p>
            <form action="{{ route('verifyCode') }}" method="POST" id="tokenModal" class="w-100 my-4">
                @csrf
                <div class="form-group">
                    <label for="">Verification Code</label><br>
                    <input type="number" name="token" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">send</button>
            </form>
        </div>
    </div>
    {{-- reset password modal --}}
    <div class="modal_2 hide">
        <div class="titleModal border-bottom">
            <h3>Reset Password</h3>
        </div>
        <div class="bodyMo">
            <form action="{{ route('updatePassword') }}" method="POST" id="resetModal" class="w-100 my-4">
                @csrf
                <div class="form-group">
                    <label for="">New Password</label><br>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label><br>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="180px" height="180px" src="{{ asset('upload/' . $data[0]->image) }}"><span
                        class="font-weight-bold">{{ $data[0]->name }}</span><span
                        class="text-black-50">{{ $data[0]->email }}</span><span>
                    </span></div>
            </div>
            <div class="col-md-9 border-right">
                <div class="p-3 py-5">
                    @if (session('message'))
                        <div class="alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <ul class="alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {{-- @dump( session('message')) --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>upload new image</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <span class="input-group-append position-absolute" style="left: -3px">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                <input type="file" name="image" class="form-control file-upload-info w-100"
                                    placeholder="Upload Image">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name"
                                    class="form-control" value="{{ $data[0]->name }}"></div>
                        </div>
                        <div class="row mt-2">
                            <input type="hidden" name="id" class="form-control" value="{{ $data[0]->id }}">
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Email</label><input type="email"
                                    class="form-control" name="email" value="{{ $data[0]->email }}"></div>
                            <div class="col-md-12"><label class="labels">Phone Number</label><input type="number"
                                    class="form-control" name="phone_number" value="{{ $data[0]->phone_number }}"></div>

                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                Profile</button></div>
                    </form>
                    <div class="d-flex align-items-center">
                        <p class="my-3">Want to change your password ?</p>
                        <form id="form" action="{{ route('sendEmail', $data[0]->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <button type="submit" class="btn ml-2 btn-sm btn-outline-google">Email Verification</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#form').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    $('.modal_').removeClass('hide')
                },
                error: function(err) {

                }
            });
        });
        $('#tokenModal').on('submit', (event) => {
            event.preventDefault();
            var formData = $('#tokenModal').serialize();
            var url2 = $('#tokenModal').attr('action');
            $.ajax({
                url: url2,
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.modal_').addClass('hide')
                    $('.modal_2').removeClass('hide')
                },
                error: function(err) {
                    var response = JSON.parse(err
                        .responseText); // تحليل الرد كنص JSON
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    });
                }
            });
        })
        $('#resetModal').on('submit', (event) => {
            event.preventDefault();
            var formData = $('#resetModal').serialize();
            var url3 = $('#resetModal').attr('action');
            $.ajax({
                url: url3,
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.modal_2').addClass('hide')
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Password has been updated successfully.',
                    });
                },
                error: function(err) {
                    var response = JSON.parse(err.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    });
                }
            })
        })
    });
</script>
