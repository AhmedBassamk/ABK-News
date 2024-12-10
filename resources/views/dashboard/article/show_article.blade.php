@extends('master')
@section('content')
    <!-- partial -->
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
                                <x-article-table />
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
            let column = ['id', 'title', 'image', 'getUser', 'action'];
            let col = column.map(element => {
                if (element === 'image') {
                    return {
                        data: element,
                        name: element,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return `<img src="{{ asset('upload/${data}') }}" style="width:80px;height:80px;"  class="img-fluid img-thumbnail">`;

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
                ajax: "{{ route('articleShow') }}",
                columns: col
            });
        })
    </script>
@endsection
