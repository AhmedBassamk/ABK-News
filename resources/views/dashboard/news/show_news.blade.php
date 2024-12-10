@extends('master')
@section('content')
    <!-- partial -->
    <style>
        .img-thumbnail {
            max-width: 150% !important;
            padding: 0;
        }
    </style>
    <div class="modal fade d-none " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog pos-relative" style="bottom: 100px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update News</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body py-0">
                    <form id="formdata" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <input type="hidden" name="id" class="form-control" id="id" />
                        </div>
                        <div class="mb-1">
                            <label for="recipient-name" class="col-form-label py-1">Title</label>
                            <input type="text" name="title" class="form-control" id="title" />
                        </div>
                        @php
                            use PragmaRX\Countries\Package\Countries;

                            $countriesCollection = Countries::all();
                            $countriesArray = $countriesCollection->pluck('name')->toArray();

                        @endphp

                        <div class="form-group">
                            <label for="exampleTextarea1">Country</label>
                            <select name="country" class="form-control" id="country">
                                @foreach ($countriesArray as $country)
                                    <option value="{{ $country['common'] }}">{{ $country['common'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="recipient-name" class="col-form-label py-1">Image upload</label>
                            <input type="file" name="image" class="form-control" id="image" />
                            <p class="text-danger" id="if_image_set" ></p>
                        </div>
                        <div class="mb-1">
                            <label for="recipient-name" class="col-form-label py-2">is active</label>
                            <input type="checkbox" name="is_active" value="1" id="is_active" />
                        </div>
                        <div class="mb-1">
                            <label for="message-text" class="col-form-label py-1">Description</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>
                        <div class="mb-1">
                            <label for="message-text" class="col-form-label py-1">Category</label>
                            <select name="category_id" class="form-control" id="category_id">

                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update">Update</button>
                </div>
            </div>
        </div>
    </div>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">News Table</h4>
                            <p class="card-description">
                                show all news
                            </p>
                            <div class="table-responsive">
                                <x-news-table />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:assetPublic/partials/_footer.html -->
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let column = ['id', 'title', 'country', 'image', 'is_active', 'views_count', 'getCategory', 'getUser',
                'action'
            ];
            let col = column.map(element => {
                if (element === 'image') {
                    return {
                        data: element,
                        name: element,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return `<img src="{{ asset('upload/${data}') }}" style="width:100px;height:80px;"  class="img-fluid img-thumbnail">`;

                        }
                    };
                } else if (element === 'is_active') {
                    return {
                        data: element,
                        name: element,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            if (data == 1) {
                                return '<span class="badge badge-success">Active</span>';
                            } else {
                                return '<span class="badge badge-danger">Not active</span>';
                            }
                        }
                    };
                } else if (element === 'views_count') {
                    return {
                        data: element,
                        name: element,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            if (data >= 1) {
                                return `<span class="">${data}</span>`;
                            } else {
                                return '<span class="">0</span>';
                            }
                        }
                    };
                } else {
                    return {
                        data: element,
                        name: element,
                        orderable: false,
                        searchable: false,
                    };
                }
            });


            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('newsShow') }}",
                columns: col
            });


            $(document).on('click', '#edit', function(event) {
                var id = $(this).data('id');
                console.log('dsgkdsjgls');
                var editRoute = "{{ route('newsEdit', ':id') }}";
                editRoute = editRoute.replace(':id', id);
                $.get(editRoute, function(data) {
                    $('.modal').removeClass('fade')
                    $('.modal').removeClass('d-none')
                    $('.modal').addClass('d-block')
                    $('#id').val(data.data.id)
                    $('#title').val(data.data.title)
                    $('#description').val(data.data.description)
                    var desiredCountryValue = data.data.country;
                    $('#country option').each(function() {
                        if ($(this).val() === desiredCountryValue) {
                            $(this).prop('selected', true);
                            return false;
                        }
                    });
                    if (data.data.is_active == 1) {
                        $('#is_active').prop('checked' , true)
                    }
                    if (data.data.image) {
                        $('#if_image_set').text(data.data.image)
                    }
                    data.cat.forEach(element => {
                        var selected = '';
                        if (element.id === data.data.category_id) {
                            selected = 'selected';
                        }

                        $('#category_id').append(`
                           <option value="${element.id}" ${selected}>${element.name}</option>
                        `);
                    });

                });
            });

            $('.update').click(() => {
                var id = $('#id').val();
                var title= $('#title').val();
                var description = $('#description').val();
                var category_id = $('#category_id').val();
                var country = $('#country').val();
                var imageInput = $('#image')[0];
                var is_active = $('#is_active');
                if (is_active.prop('checked')) {
                    var is_active = $('#is_active').val();
                }else{
                    var is_active = '0';
                }

                var formData = new FormData();
                formData.append('id', id);
                formData.append('title', title);
                formData.append('description', description);
                formData.append('category_id', category_id);
                formData.append('image', imageInput.files[0]);
                formData.append('country', country);
                formData.append('is_active', is_active);

                $.ajax({
                    url: "{{ route('newsUpdate') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    enctype: 'multipart/form-data',
                    success: function(data) {
                        $('.modal').addClass('fade')
                        $('.modal').addClass('d-none')
                        $('.modal').removeClass('d-block')
                        Swal.fire({
                            icon: 'success',
                            title: 'تم التحديث بنجاح',
                            text: data.message,
                        });

                        $('#updateModal').modal('hide');
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'حدث خطأ',
                            text: error.message,
                        });

                    }
                });
            });

            $(document).on('click', '.delete', function(event) {
                var id = $(this).data('id');
                var Route = "{{ route('newsDelete', ':id') }}";
                     Route = Route.replace(':id', id);
                $.ajax({
                    url: Route,
                    type: "delete",
                    contentType: true,
                    processData: true,
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'تم الحذف',
                            text: data.message,
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'حدث خطأ',
                            text: error.message,
                        });

                    }
                });
            })

        })
    </script>
@endsection
