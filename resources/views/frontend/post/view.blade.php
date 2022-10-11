@extends('frontend.post.partials.main')


@section('content')
{{-- Head --}}
<div class="container">
	<div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0 bg-white position-relative">
		<div class="h-100 tofront">
			<div class="row justify-content-between">
				<div class="col-md-6 pt-6 pb-6 pr-6 align-self-center">
					<p class="text-uppercase font-weight-bold">
						<a class="text-danger" href="/posts/{{ $category->slug }}">{{$category->name}}</a>
					</p>
					<h1 class="display-4 secondfont mb-3 font-weight-bold">{{$post->name}}</h1>
					<p class="mb-3">
						 {{$post->description}}
					</p>
					<div class="d-flex align-items-center">
						{{-- <img class="rounded-circle" src="assets/img/demo/avatar2.jpg" width="70"> --}}
						<small class="ml-2">Jane Seymour <span class="text-muted d-block">{{$post->created_at->format('d/m/Y')}}</span>
						</small>
					</div>
				</div>
				<div class="col-md-6 pr-0">
					<img src="{{$post->image}}">
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Main --}}
<div class="container pt-4 pb-4">
	<div class="row justify-content-center">
		<div class="col-md-12 col-lg-8">
            @php
                echo $post->content;
            @endphp
            <div class="border p-5 bg-lightblue">
				<div class="row justify-content-between">
					<div class="col-md-5 mb-2 mb-md-0">
						<h5 class="font-weight-bold secondfont">Liên hệ tác giả</h5>
					</div>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="Enter your e-mail address">
							</div>
							<div class="col-md-12 mt-2">
								<button type="submit" class="btn btn-success btn-block">Send Author</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
