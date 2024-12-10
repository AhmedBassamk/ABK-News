@extends('master')
@section('content')
    <!-- partial -->

    <div class="modal fade d-none " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog pos-relative" style="bottom: 100px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body p-2">
                    <form id="formdata" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <input type="hidden" name="id" class="form-control" id="id" />
                        </div>
                       <div class="d-flex">
                        <div class="mb-1 col-md-6">
                            <label for="recipient-name" class="col-form-label">Name in english</label>
                            <input type="text" name="name_en" class="form-control" id="name_en" />
                        </div>
                        <div class="mb-1 col-md-6">
                            <label for="recipient-name" class="col-form-label">Name in arabic</label>
                            <input type="text" name="name_ar" class="form-control" id="name_ar" />
                        </div>
                       </div>
                        <div class="mb-1 col-12">
                            <label for="recipient-name" class="col-form-label">Image upload</label>
                            <input type="file" name="image" class="form-control" id="image" />
                        </div>
                        <div class="d-flex">
                            <div class="mb-1 col-md-6">
                                <label for="message-text" class="col-form-label">Description in english</label>
                                <textarea name="description_en" class="form-control" id="description_en"></textarea>
                            </div>
                            <div class="mb-1 col-md-6">
                                <label for="message-text" class="col-form-label">Description in arabic</label>
                                <textarea name="description_ar" class="form-control" id="description_ar"></textarea>
                            </div>
                        </div>
                        <div class="mb-1 col-12">
                            <label for="message-text" class="col-form-label">Parent Category</label>
                            <select name="parent_id" class="form-control" id="parent_id">

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
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <h4 class="card-title">Category Table</h4>
                                    <p class="card-description">
                                        show all category
                                    </p>
                                </div>
                                <a href="{{ route('categoryAdd') }}" class="btn btn-primary">Add Category</a>
                            </div>
                            <div class="table-responsive">
                                <x-category-table />
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
            let column = ['id', 'name.ar', 'image', 'parent', 'action'];
            let col = column.map(element => {
                if (element === 'image') {
                    return {
                        data: element,
                        name: element,
                        orderable: true,
                        searchable: true,
                        render: function(data, type, full, meta) {
                            return `<img src="{{ asset('upload/${data}') }}" style="width:80px;height:80px;"  class="img-fluid img-thumbnail">`;

                        }
                    };
                } else {
                    return {
                        data: element,
                        name: element,
                        orderable: true,
                        searchable: true,
                    };
                }
            });
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('categoryShow') }}",
                columns: col
            });

            $(document).on('click', '#edit', function(event) {
                var id = $(this).data('id');
                var editRoute = "{{ route('categoryEdit', ':id') }}";
                editRoute = editRoute.replace(':id', id);
                $.get(editRoute, function(data) {
                    $('.modal').removeClass('fade')
                    $('.modal').removeClass('d-none')
                    $('.modal').addClass('d-block')
                    $('#id').val(data.data.id)
                    $('#name').val(data.data.name)
                    $('#description').val(data.data.description)

                    data.cat.forEach(element => {
                        var selected = '';
                        if (element.id === data.data.parent_id) {
                            selected = 'selected';
                        }

                        $('#parent_id').append(`
                           <option value="${element.id}" ${selected}>${element.name}</option>
                        `);
                    });

                });
            });

            $('.update').click(() => {
                var id = $('#id').val();
                var name = $('#name_en').val();
                var name_ar = $('#name_ar').val();
                var description = $('#description_en').val();
                var description_ar = $('#description_ar').val();
                var parent_id = $('#parent_id').val();
                var imageInput = $('#image')[0];

                var formData = new FormData();
                formData.append('id', id);
                formData.append('name_en', name);
                formData.append('name_ar', name_ar);
                formData.append('description_en', description);
                formData.append('description_ar', description_ar);
                formData.append('parent_id', parent_id);
                formData.append('image', imageInput.files[0]); // هنا يتم إضافة الملف إلى FormData

                $.ajax({
                    url: "{{ route('categoryUpdate') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
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
                var Route = "{{ route('categoryDelete', ':id') }}";
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
