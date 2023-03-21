@extends('backend.layouts.master')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components/custom-carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        .component-card_9 {
            border: 1px solid #1b2e4b;
            border-radius: 6px;
            width: auto;
            margin: 0 auto;
        }

        .modal-header {
            border-bottom: 1px solid #1b2e4b;
        }

        .modal-footer {
            border-top: 1px solid #1b2e4b;
        }

        .custom-file-container__image-preview {
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px dotted;
        }

        .widget-table-two .table>tbody>tr>td:last-child {
            padding: 0px;
        }

        .widget-table-two .table>tbody>tr>td {
            background: #1b2e4b14;
        }

        .widget-table-two .table>thead>tr>th:last-child .th-content {
            text-align: right;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            max-height: 455px;
            overflow-y: scroll;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 1px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #191e3a;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: orangered;
        }
    </style>
@endpush
@section('content')
       <div class="row layout-top-spacing">
        <div class="col-lg-12 col-md-12 layout-spacing">
            <div class="card">
                <div class="card-body">
                    <h5>Add Product</h5>
                    <hr>
                    <form id="productFormO" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name', $product->name ?? '') }}" placeholder="Product name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title" id="sub_title"
                                        value="{{ old('sub_title', $product->sub_title ?? '') }}" placeholder="Sub title">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="custom-file-container" data-upload-id="thumbnail">
                                    <label>Thumbnail (Single File) <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="thumbnail"
                                            class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview" style="background-image: url('{{  asset('storage/images/thumbnail/'. old('discount_type', $product->productImage->image ?? ''))  }}')!important;">
                                       </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="custom-file-container" data-upload-id="image1">
                                    <label>Image One (Single File) <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="image1"
                                            class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="custom-file-container" data-upload-id="image2">
                                    <label>Image Two (Single File) <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="image2"
                                            class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="custom-file-container" data-upload-id="image3">
                                    <label>Image Three (Single File) <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="image3"
                                            class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="250" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>

                            <div class="col-md-3">
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" name="price" id="price"
                                            value="{{ old('price', $product->price ?? '') }}" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sale_price">Sale Price</label>
                                        <input type="number" class="form-control" name="sale_price" id="sale_price"
                                            value="{{ old('sale_price', $product->sale_price ?? '') }}" placeholder="Sale Price">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="discount_type">Discount Type</label>
                                        <select class="form-control" name="discount_type" id="discount_type">
                                            <option value="">Select Discount Type</option>
                                                <option value="0" {{ old('discount_type', $product->discount_type ?? '') == 0 ? 'selected':'' }}>Fix Price</option>
                                                <option value="1" {{ old('discount_type', $product->discount_type ?? '') == 1 ? 'selected':'' }}>Percentage</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="discount">Discount Price</label>
                                        <input type="number" class="form-control" name="discount" id="discount"
                                            value="{{ old('discount', $product->discount ?? '') }}" placeholder="Discount Price">
                                    </div>
                                </div>
                               </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="forImageOne">For Image One</label>
                                    <textarea name="forImageOne" id="forImageOne" class="form-control" rows="13"  placeholder="Enter for image one">{{ old('forImageOne', $product->productImage->details1 ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="forImageTwo">For Image Two</label>
                                    <textarea name="forImageTwo" id="forImageTwo" class="form-control" rows="13"  placeholder="Enter for image Two">{{ old('forImageTwo', $product->productImage->details1 ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="forImageThree">For Image Three</label>
                                    <textarea name="forImageThree" id="forImageThree" class="form-control" rows="13"  placeholder="Enter for image Three">{{ old('forImageThree', $product->productImage->details1 ?? '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
@endsection
@push('js')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        var firstUpload = new FileUploadWithPreview('thumbnail')
        var secondUpload = new FileUploadWithPreview('image1')
        var secondUpload = new FileUploadWithPreview('image2')
        var secondUpload = new FileUploadWithPreview('image3')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->


    <script>
        $("#productForm").on("submit", function(event) {
            event.preventDefault();
            var formValues = $(this).serialize();
            $.post("{{ route('product.store') }}", formValues, function(data) {
                if (data.error) {
                    swal({
                        title: 'Error!',
                        text: data.error,
                        type: 'error',
                        padding: '2em'
                    })
                } else {
                    swal({
                        title: 'Success!',
                        text: 'Successfuly added category',
                        type: 'success',
                        padding: '2em'
                    });
                }
            });
        });

    </script>
@endpush
