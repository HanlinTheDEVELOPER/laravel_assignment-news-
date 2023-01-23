@extends('Layout.app')
@section('title', 'Admin Dashboard')

@section('contents')
    <div class="w-full h-12 bg-gray-700 px-3 mb-3 flex justify-between items-center rounded">
        <nav class="flex">
            <a class="px-2 py-1 rounded-l @if ($data == 'all') text-gray-200 bg-gray-700 border border-white
            @else
                text-gray-700 bg-gray-200 @endif cursor-pointer"
                href="{{ url('/news/all') }}">All</a>
            <a class="px-2 py-1 border border-x-black border-x-4 @if ($data == 'breaking') text-gray-200 bg-gray-700 border border-white
            @else
                text-gray-700 bg-gray-200 @endif cursor-pointer"
                href="{{ url('/news/breaking') }}"> Breaking</a>
            <a class="px-2 py-1 rounded-r  @if ($data == 'normal') text-gray-200 bg-gray-700 border border-white
            @else
                text-gray-700 bg-gray-200 @endif cursor-pointer"
                href="{{ url('/news/normal') }}">Normal</a>
        </nav>
        <!-- Button trigger modal -->
        <button class="px-2 py-1 rounded text-gray-700 bg-gray-200" data-bs-target="#exampleModal" data-bs-toggle="modal"
            type="button">
            Add News
        </button>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal modal-xl fade " id="exampleModal"
            tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <h5 class="modal-title" id="exampleModalLabel">Create </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>
                    <form action="{{ url('/uploadNews') }}" class="modal-body " enctype="multipart/form-data"
                        method="post">
                        @csrf
                        <div class="flex w-full  gap-4">
                            <div class="rounded overflow-hidden" style="width: 360px;height: 250px">
                                <img alt="news_upload_image_preview" class="w-full h-full" id="news_upload_image_preview"
                                    src="{{ asset('Admin/images/no-image.png') }}">
                            </div>
                            <div class=" w-3/5 flex flex-col justify-between">
                                <input class="form-control rounded" name="title" placeholder="News Title" type="text">
                                <select class="form-control rounded" id="news_tag_select_button" name="tag">
                                    <option disabled selected value="">--Please choose an option--</option>
                                    <option value="normal">Normal News</option>
                                    <option value="breaking">Breaking News</option>
                                </select>
                                <input class="form-control rounded" id="news_image_upload" name="photo" type="file">
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="flex justify-center gap-3" id="regions_list_parent">
                            <textarea class="form-control" id="summernote" name="body"></textarea>
                            <div class="border  w-2/5 p-2" id="regions_list_to_check" style="display: none">
                                <div class="mb-3">Choose one or more effective Regions</div>
                                <div class="grid grid-cols-3">
                                    @foreach ($regions as $region)
                                        <div>
                                            <input name="{{ $region->id }}" type="checkbox">
                                            <label for="{{ $region->id }}">{{ $region->name }}</label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="text-end">
                            <button class="text-white bg-black/50 px-2 py-1 rounded">Upload</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @yield('table')

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e) {

        $('#summernote').summernote({
            placeholder: 'Enter News Detail',
            tabsize: 2,
            height: 150
        });
        $('#news_image_upload').change(function() {
            console.log('ad')

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#news_upload_image_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });
        $('#news_tag_select_button').change(function(event) {
            if (event.target.value === 'breaking') {
                $("#regions_list_to_check").css("display", "block");
            } else {
                $("#regions_list_to_check").css("display", "none");
            }
        })
    });
</script>
