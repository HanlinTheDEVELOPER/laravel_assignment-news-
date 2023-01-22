@extends('Page.home')
@section('table')
    <div class="rounded overflow-hidden">
        <table class="table table-dark table-striped table-sm ">
            <thead>
                <tr>
                    <th class="h-16 align-middle">No.</th>
                    <th class="h-16 align-middle">Title</th>
                    <th class="h-16 align-middle">Photo</th>
                    <th class="h-16 align-middle">Body</th>
                    <th class="h-16 align-middle">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($news as $item)
                    <tr>
                        <td class="w-1/12 h-12 text-end overflow-hidden">{{ $loop->index + 01 }}.</td>
                        <td class="w-2/12 h-12 overflow-hidden">{{ $item->title }}</td>
                        <td class="w-1/12 h-12 overflow-hidden"><img class="w-full h-full"
                                src="{{ Cloudinary::getUrl($item->photo) }}" /></td>
                        <td class="w-6/12 h-12 overflow-hidden">{{ $item->body }}</td>
                        <td class="w-2/12 h-12 overflow-hidden">Actions</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
