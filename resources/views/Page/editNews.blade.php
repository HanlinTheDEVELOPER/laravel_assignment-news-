@extends('Page.home')

@section('contents')
    <div>
        <h5 class="text-2xl py-2">Edit</h5>
    </div>
    <form action="{{ url('/updateNews') }}" enctype="multipart/form-data" method="post">
        @csrf
        <input hidden name="id" type="text" value="{{ $item->id }}">
        <div class="flex w-full  gap-4">
            <div class="rounded overflow-hidden" style="width: 360px;height: 250px">
                @if ($item->photo)
                    <img alt="news_upload_image_preview_edit" class="w-full h-full" id="news_upload_image_preview"
                        src="{{ Cloudinary::getUrl($item->photo) }}">
                @else
                    <img alt="news_upload_image_preview_edit" class="w-full h-full" id="news_upload_image_preview"
                        src="{{ asset('Admin/images/no-image.png') }}">
                @endif
            </div>
            <div class=" w-3/5 flex flex-col justify-between">
                <input class="form-control rounded" name="title" placeholder="News Title" type="text"
                    value="{{ $item->title }}">
                <select class="form-control rounded" id="news_tag_select_button_edit" name="tag">
                    <option @if ($item->tag == 'normal') selected @endif value="normal">Normal News
                    </option>
                    <option @if ($item->tag == 'breaking') selected @endif value="breaking">Breaking News
                    </option>
                </select>
                <input class="form-control rounded" id="news_image_upload" name="photo" type="file">
            </div>
        </div>
        <hr class="my-3">
        <div class="flex justify-center gap-3" id="regions_list_parent_edit">
            <textarea class="form-control" id="summernote_edit" name="body">
                {{ $item->body }}
            </textarea>
            <div class="border border-black w-2/5 p-2" id="regions_list_to_check_edit"
                style="@if ($item->tag == 'normal') display: none @endif">
                <div class="mb-3">Choose one or more effective Regions</div>
                <div class="grid grid-cols-3">
                    @foreach ($regions as $region)
                        <div>
                            <input @if (Arr::has($relatedRegions, $region->id - 1)) checked @endif name="{{ $region->id }}"
                                type="checkbox">
                            <label for="{{ $region->id }}">{{ $region->name }}</label>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <hr class="my-3">
        <div class="text-end">
            <button class="text-white bg-black/50 px-2 py-1 rounded">Update</button>
        </div>
    </form>

    </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e) {

        $('#summernote_edit').summernote({
            placeholder: 'Enter News Detail',
            tabsize: 2,
            height: 150
        });
        $('#news_image_upload_edit').change(function() {


            let reader = new FileReader();

            reader.onload = (e) => {

                $('#news_upload_image_preview_edit').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });
        $('#news_tag_select_button_edit').change(function(event) {
            if (event.target.value === 'breaking') {
                $("#regions_list_to_check_edit").css("display", "block");
            } else {
                $("#regions_list_to_check_edit").css("display", "none");
            }
        })
    });
</script>
