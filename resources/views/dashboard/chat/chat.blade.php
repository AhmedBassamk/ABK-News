@extends('master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            overflow-y: scroll;
            box-shadow: 0 0 5px gray;
            border-radius: 15px;
            margin: 10px 0;
        }
        .chat-messages::-webkit-scrollbar-corner{
            background: white;
            box-shadow: 0 0 5px rgb(160, 160, 160);
            border-radius:10px;
        }
        .chat-messages::-webkit-scrollbar-thumb{
            background: white;
            box-shadow: 0 0 5px rgb(160, 160, 160);
            border-radius:10px;
        }
        .chat-messages::-webkit-scrollbar{
            background: white;
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
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .flex-grow-0 {
            flex-grow: 0 !important;
        }

        .border-top {
            border-top: 1px solid #dee2e6 !important;
        }
    </style>

    </head>

    <body>
        <div class="col-12 col-lg-7 col-xl-9">
            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                <div class="d-flex align-items-center py-1">
                    <div class="position-relative">
                        <img src="{{ asset('upload/' . $receiver->image) }}" class="rounded-circle mr-1" alt="Sharon Lessman"
                            width="40" height="40">
                    </div>
                    <div class="flex-grow-1 pl-3">
                        <strong>{{ $receiver->name }}</strong>
                    </div>
                </div>
            </div>

            <div class="position-relative">
                <div class="chat-messages p-4" style="height: 400px">
                    @foreach ($chatMessages as $message)
                        <div class="chat-message-{{ $message->sender == $userId ? 'right' : 'left' }} pb-4">
                            <div>
                                <img src="{{ asset('upload/' . ($message->sender == $userId ? Auth::user()->image : $receiver->image)) }}"
                                    class="rounded-circle mr-1"
                                    alt="{{ $message->sender == $userId ? Auth::user()->name : $receiver->name }}"
                                    width="40" height="40">
                                <div class="text-muted small text-nowrap mt-2">{{ $message->created_at->format('h:i a') }}
                                </div>
                            </div>
                            <div
                                class="flex-shrink-1 bg-light rounded py-2 px-3 {{ $message->sender == $userId ? 'mr-3' : 'ml-3' }}">
                                <div class="font-weight-bold mb-1">
                                    {{ $message->sender == $userId ? 'You' : $receiver->name }}</div>
                                {{ $message->message }}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="flex-grow-0 py-3 px-4 border-top">
                <form action="{{ route('send', $receiver->id) }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="message" id="message"
                            placeholder="Type your message">
                        <button type="submit" class="btn btn-primary ml-4" id="send">Send</button>
                    </div>
                </form>

            </div>

        </div>
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('6f47f2344d88ed05aaa8', {
                cluster: 'ap2'
            });
            // console.log('chatAdmins {{ auth()->user()->id }}');
            var channel = pusher.subscribe('chatAdmins{{ auth()->user()->id }}');
            channel.bind('MessageSend', function(data) {

                let receiver = `<div class="chat-message-left pb-4">
            <div>
                <img src="{{ asset('upload/' . $receiver->image) }}" class="rounded-circle mr-1"
                    alt="Sharon Lessman" width="40" height="40">
                <div class="text-muted small text-nowrap mt-2">2:44 am</div>
            </div>
            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                <div class="font-weight-bold mb-1">{{ $receiver->name }}</div>
              ${JSON.stringify(data.message)}
            </div>
        </div>`;
                $(".chat-messages").append(receiver);

            });

            $('#send').click((event) => {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('send', $receiver->id) }}",
                    method: "post",
                    data: {
                        message: $('#message').val()
                    },
                    success: (data, status) => {
                        console.log("sfsfsfs" + data, status);
                        let sMessage = '' +
                            ` <div class="chat-message-right pb-4">
                    <div>
                        <img src="{{ asset('upload/' . auth()->user()->image) }}" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                        <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                    </div>
                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                        <div class="font-weight-bold mb-1">You</div>
                        ${$('#message').val()}
                    </div>
                </div>`;
                        $(".chat-messages").append(sMessage);
                    },
                    error: (er) => {
                        console.log(er.responseJSON);
                    }
                });
            });
        </script>
    @endsection
