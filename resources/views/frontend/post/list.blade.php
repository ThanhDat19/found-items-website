@extends('frontend.post.partials.main')
@section('head')
@endsection
@section('content')
    <section class="category first" style="padding-top: 100px;">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th style="...">ID</th>
                                <th>Tên bài đăng</th>
                                <th>Hình ảnh</th>
                                <th>Loại bài đăng</th>
                                <th>Trạng thái | Tố cáo</th>
                                <th>Cập nhật</th>
                                <th style="...">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)

                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td><img src="{{ $post->image }}" alt="{{ $post->name }}"
                                            style="width:150px; height:150px; object-fit:cover;"></td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        @if ($post->active == 0)
                                            <span class="btn btn-danger btn-xs">NO</span>
                                        @elseif($post->active == 1)
                                            <span class="btn btn-success btn-xs">YES</span>
                                        @elseif($post->active == 2)
                                            <span class="btn btn-success btn-xs">FOUND</span>
                                        @endif
                                        <a href="#"
                                            class="btn btn-warning btn-xs">{{ $post->report->count() }}</a>
                                    </td>
                                    <td>
                                        @if ($post->updated_at == null)
                                            <span class="text-danger">Chưa đặt thời gian</span>
                                        @endif
                                        {{ $post->updated_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        {{-- <a href="/admin/posts/edit/{{ $post->id }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a> --}}
                                        <a href="/posts-list/edit/{{ $post->id }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#"
                                            onclick="removeRow({{ $post->id }},'/posts-list/destroy')"class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{-- {{ $posts->links() }} --}}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
@endsection
