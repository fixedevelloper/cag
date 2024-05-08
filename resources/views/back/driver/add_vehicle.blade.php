@extends('back.layout')
@push('css')
    <link href="{!! asset('front/vendor/jquery-asColorPicker/css/asColorPicker.min.css') !!}" rel="stylesheet">
    <style>
        .asColorPicker-wrap {
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Add vehicle</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Cars</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
                </ol>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-right">
                </div>
                <div class="card-body">
                    <div class="basic-for">
                    <form  method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Brand</label>
                                    <input name="brand" type="text" class="form-control" placeholder="Brand" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Number</label>
                                    <input name="number" type="text" class="form-control" placeholder="Number" required>
                                </div>
                                <div class="col-12 example">
                                    <label class="form-label">Color</label>
                                    <div class="example">
                                    <input name="color" type="text" class="complex-colorpicker form-control" value="#fa7a7a" required>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-5">
                                <div>
                                    <label class="form-label">Image From</label>
                                    <div class="input-group custom_file_input mb-3">
                                        <div class="form-file">
                                            <input name="image_from" type="file" class="form-file-input form-control">
                                        </div>
                                        <span class="input-group-text">From</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Image Back</label>
                                    <div class="input-group custom_file_input mb-3">
                                        <div class="form-file">
                                            <input type="file" name="image_back" class="form-file-input form-control" required>
                                        </div>
                                        <span class="input-group-text">Back</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Image Right</label>
                                    <div class="input-group custom_file_input mb-3">
                                        <div class="form-file">
                                            <input type="file" name="image_right" class="form-file-input form-control" required>
                                        </div>
                                        <span class="input-group-text">Right</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Image Left</label>
                                    <div class="input-group custom_file_input mb-3">
                                        <div class="form-file">
                                            <input type="file" name="image_left" class="form-file-input form-control" required>
                                        </div>
                                        <span class="input-group-text">Left</span>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <!-- asColorpicker -->
    <script src="{!! asset('front/vendor/jquery-asColor/jquery-asGradient.min.js') !!}"></script>
    <script src="{!! asset('front/vendor/jquery-asColor/jquery-asColor.min.js') !!}"></script>
    <script src="{!! asset('front/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') !!}"></script>
    <script src="{!! asset('front/js/jquery-asColorPicker.init.js') !!}"></script>
    @endpush
