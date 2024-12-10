@extends('master')
@section('content')
<style>
    .chat-online {
    color: #34ce57
}

.chat-offline {
    color: #e4606d
}

.chat-messages {
    display: flex;
    flex-direction: column;
    max-height: 800px;
    overflow-y: scroll
}

.chat-message-left,
.chat-message-right {
    display: flex;
    flex-shrink: 0
}

.chat-message-left {
    margin-right: auto
}

.chat-message-right {
    flex-direction: row-reverse;
    margin-left: auto
}
.py-3 {
    padding-top: 1rem!important;
    padding-bottom: 1rem!important;
}
.px-4 {
    padding-right: 1.5rem!important;
    padding-left: 1.5rem!important;
}
.flex-grow-0 {
    flex-grow: 0!important;
}
.border-top {
    border-top: 1px solid #dee2e6!important;
}
</style>
    <!-- partial -->
    <main class="content col-10">
        <div class="container p-0 my-4">

            <h1 class="h3 mb-3">Messages</h1>

            <div class="card">
                <div class="row">
                    <div class="col-12 border-right">

                        <div class="px-4 d-none d-md-block">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control my-3" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        @foreach ($admins as $admin_data )
                        <a href="{{ route('chat' , $admin_data->id) }}" class="list-group-item list-group-item-action border-0">
                            <div class="badge bg-success float-right">5</div>
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('upload/'.$admin_data->image) }}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                <div class="flex-grow-1 ml-3">
                                    {{ $admin_data->name }}
                                    <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                                </div>
                            </div>
                        </a>
                        @endforeach

                        <hr class="d-block d-lg-none mt-1 mb-0">
                    </div>

                </div>
            </div>
        </div>
    </main>
    <!-- main-panel ends -->
@endsection
