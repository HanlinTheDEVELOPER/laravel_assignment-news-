@extends('Layout.app')
@section('title', 'Admin Dashboard')

@section('contents')
    <div class="w-full h-12 bg-gray-700 px-3 mb-3 flex justify-between items-center rounded">
        <nav class="flex">
            <a class="px-2 py-1 rounded-l text-gray-700 bg-gray-200 cursor-pointer" href="{{ url('/news/all') }}">All</a>
            <a class="px-2 py-1 border border-x-black border-x-4 text-gray-700 bg-gray-200 cursor-pointer"
                href="{{ url('/news/breaking') }}"> Breaking</a>
            <a class="px-2 py-1 rounded-r  text-gray-700 bg-gray-200 cursor-pointer"
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
                                <select class="form-control rounded" name="tag">
                                    <option disabled selected value="">--Please choose an option--</option>
                                    <option value="dog">Dog</option>
                                    <option value="cat">Cat</option>
                                </select>
                                <input class="form-control rounded" id="news_image_upload" name="photo" type="file">
                            </div>
                        </div>
                        <hr class="mt-3">
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


        $('#news_image_upload').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#news_upload_image_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });



    });
</script>
