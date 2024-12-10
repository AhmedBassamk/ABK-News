@extends('master')
@section('content')
    <style>
        .profile-head {
            transform: translateY(5rem)
        }

        .cover {
            background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
            background-size: cover;
            background-repeat: no-repeat
        }

        @import url(https://fonts.googleapis.com/css?family=Raleway:400,600,700);
        @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);

        figure.snip1312 {
            font-family: 'Raleway', Arial, sans-serif;
            position: relative;
            overflow: hidden;
            margin: 10px;
            min-width: 250px;
            max-width: 310px;
            width: 100%;
            height: 400px;
            background-color: #ffffff;
            color: #000000;
            text-align: left;
            font-size: 16px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
        }

        figure.snip1312 * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        figure.snip1312 img {
            max-width: 100%;
            vertical-align: top;
            position: relative;
            object-fit: cover;
        }

        figure.snip1312 figcaption {
            position: absolute;
            bottom: 15px;
            left: 15px;
            right: 15px;
            padding: 15px 15px 30px;
            background-color: #ffffff;
            text-align: end;
        }

        figure.snip1312 .date {
            background-color: #7f8c8d;
            top: 15px;
            color: #fff;
            left: 15px;
            min-height: 48px;
            min-width: 48px;
            position: absolute;
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }

        figure.snip1312 .date span {
            display: block;
            line-height: 24px;
        }

        figure.snip1312 .date .month {
            font-size: 14px;
            background-color: rgba(0, 0, 0, 0.1);
        }

        figure.snip1312 h3,
        figure.snip1312 p {
            margin: 0;
            padding: 0;
            line-height: 32px
        }

        figure.snip1312 h3 {
            min-height: 50px;
            margin-bottom: 10px;
            margin-left: 60px;
            display: inline-block;
            font-weight: 600;
            text-transform: uppercase;
        }

        figure.snip1312 p {
            font-size: 0.8em;
            margin-bottom: 20px;
            line-height: 1.6em;
        }

        figure.snip1312 footer {
            padding: 0 25px;
            background-color: #667273;
            color: #e6e6e6;
            font-size: 0.8em;
            line-height: 30px;
            text-align: right;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        figure.snip1312 footer>div {
            display: inline-block;
            margin-left: 10px;
        }

        figure.snip1312 footer i {
            color: rgba(255, 255, 255, 0.2);
            margin-right: 5px;
        }

        figure.snip1312 a {
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            position: absolute;
            z-index: 1;
        }

        figure.snip1312:hover img,
        figure.snip1312.hover img {
            -webkit-transform: scale(1.15);
            transform: scale(1.15);
        }
    </style>
    <div class="row py-5 px-4 col-md-10">
        <div class="col-md-12 mx-auto"> <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3"><img src="{{ asset('upload/' . auth()->user()->image) }}" alt="..."
                                width="130" class="rounded mb-2 img-thumbnail"><a href="{{ route('editProfile', auth()->user()->id) }}"
                                class="btn btn-outline-dark btn-sm btn-block">Go to sittings</a></div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-4">{{ auth()->user()->name }}</h4>
                        </div>
                    </div>
                </div>
                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">{{ $newsCount }}</h5><small class="text-muted"> <i
                                    class="fas fa-image mr-1"></i>News</small>
                        </li>
                        {{-- <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted"> <i
                                    class="fas fa-user mr-1"></i>Followers</small>
                        </li> --}}

                    </ul>
                </div>
                <div class="px-4 py-3">
                    <h5 class="mb-0">About</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <p class="font-italic mb-0"><span class="text-danger">Admin</span></p>
                        <p class="font-italic mb-0"><span>Phone : </span>{{ auth()->user()->phone_number }}</p>
                        <p class="font-italic mb-0"><span>Email : </span>{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Latest News</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                    </div>
                    <div class="row">
                        @foreach ($newsdata as $item)
                            <figure class="snip1312">
                                <div class="image"><img src="{{ asset('upload/' . $item->image) }}" alt="pr-sample11" />
                                </div>
                                <figcaption>
                                    <div class="date"><span class="day">{{  $item->created_at->day }}</span><span class="month">{{  $item->created_at->month }}</span></div>
                                    <h3>{{ $item->title }}</h3>
                                    <p>

                                        {{ $item->description }}
                                    </p>
                                    <footer>
                                        <div class="love"><i class="ion-heart"></i>{{ $item->getCategory->name }}</div>
                                    </footer>
                                </figcaption><a href="#"></a>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
@endsection
<script>
 $(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);
</script>
