@extends('layouts.main')
@section('head-title', 'Статьи')

@section('content')
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Наш блог</span>
                        <h1 class="text-capitalize mb-4 text-lg">Статьи</h1>
                        {{ Breadcrumbs::view('partials.site.breadcrumbs', 'posts.index') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if(count($posts) > 0)
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-lg-6 col-md-6 mb-5">
                                    <div class="blog-item">
                                        <img src="{{ $post->preview_image ? asset('storage/' . $post->preview_image) : asset('assets/admin/img/avatar.png') }}" alt="" class="img-fluid rounded">

                                        <div class="blog-item-content bg-white p-4">
                                            <div class="blog-item-meta  py-1 px-2">
                                                <span class="text-muted text-capitalize mr-3">
                                                    <i class="ti-pencil-alt mr-2"></i>{{ $post->category->title }}
                                                </span>
                                            </div>
                                            @php
                                                $isLiked = $post->userHasLiked(); // true, false или null
                                            @endphp
                                            <div class="likes-group py-1">
                                                @if(is_null($isLiked))
                                                    <button data-post-id="{{ $post->id }}" data-type="btn-like" style="border: 0; outline: none; background: transparent;">
                                                        <i class="far fa-thumbs-up"></i>
                                                    </button>
                                                @elseif($isLiked)
                                                    <button data-post-id="{{ $post->id }}" data-type="btn-like" style="border: 0; outline: none; background: transparent;">
                                                        <i class="fas fa-thumbs-up"></i>
                                                    </button>
                                                @else
                                                    <button data-post-id="{{ $post->id }}" data-type="btn-like" style="border: 0; outline: none; background: transparent;">
                                                        <i class="far fa-thumbs-up"></i>
                                                    </button>
                                                @endif

                                                <span data-type="like-count-{{ $post->id }}">
                                                    {{ $post->likesCount }}
                                                </span>


                                                @if(is_null($isLiked))
                                                    <button data-post-id="{{ $post->id }}" data-type="btn-dislike" style="border: 0; outline: none; background: transparent;">
                                                        <i class="far fa-thumbs-down"></i>
                                                    </button>
                                                @elseif($isLiked)
                                                    <button data-post-id="{{ $post->id }}" data-type="btn-dislike" style="border: 0; outline: none; background: transparent;">
                                                        <i class="far fa-thumbs-down"></i>
                                                    </button>
                                                @else
                                                    <button data-post-id="{{ $post->id }}" data-type="btn-dislike" style="border: 0; outline: none; background: transparent;">
                                                        <i class="fas fa-thumbs-down"></i>
                                                    </button>
                                                @endif
                                                <span data-type="dislike-count-{{ $post->id }}">
                                                    {{ $post->dislikesCount }}
                                                </span>
                                            </div>

                                            <h3 class="mt-3 mb-3">
                                                <a href="blog-single.html">{{ $post->title }}</a>
                                            </h3>
                                            <p class="mb-4">

                                            </p>

                                            <a href="blog-single.html" class="btn btn-small btn-main btn-round-full">
                                                Подробнее
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget search card p-4 mb-3 border-0">
                            <input type="text" class="form-control" placeholder="Поиск">
                            <a href="#" class="btn btn-mian btn-small d-block mt-2">Поиск</a>
                        </div>

                        @if(count($latestPosts) > 0)
                            <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                                <h5>Последние посты</h5>

                                @foreach($latestPosts as $lPost)
                                    <div class="media border-bottom py-3">
                                        <a href="#">
                                            <img class="mr-4"
                                                 width="87"
                                                 height="72"
                                                 src="{{ $lPost->preview_image ? asset('storage/' . $lPost->preview_image) : asset('assets/admin/img/avatar.png') }}" alt=""/>
                                        </a>
                                        <div class="media-body">
                                            <h6 class="my-2"><a href="#">{{ $lPost->title }}</a></h6>
                                            <span class="text-sm text-muted">{{ $lPost->dateAsCarbon->day }} {{ $lPost->dateAsCarbon->translatedFormat('F') }} {{ $lPost->dateAsCarbon->year }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if(count($tags) > 0)
                            <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                                <h5 class="mb-4">Теги</h5>

                                @foreach($tags as $tag)
                                    <a href="">{{ $tag->title }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-8">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
