@extends('frontend.post.partials.main')


@section('content')
<section class="home first" style="padding-top: 150px;">

    <div class="container rounded bg-white mt-5 mb-5">
        <table class="table" id="myTable">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên bài đăng</th>
                    <th scope="col">Người đăng</th>
                    <th scope="col">Ngày Đăng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach ($followPosts as $post)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $post->post->name }}</td>
                        <td>{{ $post->post->user->name }}</td>
                        <td>{{ $post->post->updated_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="/posts/{{ $post->post->category->slug }}/{{ $post->post->slug }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#"
                                onclick="removeRow({{ $post->id }},'/profile/posts/follow/destroy')"class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
