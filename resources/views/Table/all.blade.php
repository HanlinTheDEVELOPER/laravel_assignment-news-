@extends('Page.home')
@section('table')
  <div class="overflow-hidden rounded">
    <table class="table-dark table-striped table-sm table">
      <thead>
        <tr>
          <th class="h-16 text-center align-middle">No.</th>
          <th class="h-16 align-middle">Title</th>
          <th class="h-16 align-middle">Photo</th>
          <th class="h-16 align-middle">Body</th>
          <th class="h-16 align-middle">Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($news as $item)
          <tr>
            <td class="h-12 w-1/12 overflow-hidden text-center">{{ $loop->index + 01 }}.</td>
            <td class="h-12 w-2/12 overflow-hidden">{{ $item->title }}</td>
            <td class="h-12 w-1/12 overflow-hidden"><img class="h-full w-full"
                   src="{{ Cloudinary::getUrl($item->photo) }}" /></td>
            <td class="h-12 w-6/12 overflow-hidden">{!! $item->body !!} </td>
            <td class="h-12 w-2/12 overflow-hidden">

              <a class="rounded bg-gray-700 px-2 py-1 text-green-200"
                 href="{{ url('/editNews/' . $item->id) }}">Edit</a>

              <form action="{{ url('/deleteNews') }}"
                    class="inline"
                    method="POST">
                @csrf
                @method('DELETE')
                <input hidden
                       name="id"
                       type="text"
                       value="{{ $item->id }}">
                <button class="rounded bg-gray-700 px-2 py-1 text-red-400">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>
@endsection
