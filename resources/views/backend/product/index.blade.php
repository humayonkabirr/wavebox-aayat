@extends('backend.layouts.master')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components/custom-carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <style>
        .component-card_9 {
            border: 1px solid #1b2e4b;
            border-radius: 6px;
            width: auto;
            margin: 0 auto;
        }

        .component-card_9:hover {
            box-shadow: 0px 0px 12px 4px #636cada6 !important;
            transition: 0.99s
        }

        .layout-spacing {
            padding: 6px !important;
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
    </style>
@endpush
@section('content')
    <div class="row layout-top-spacing">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 layout-spacing">
                <div class="card component-card_9">
                    <img src="{{  asset('storage/images/thumbnail/'.$product->productImage->image ?? '')  }}" class="card-img-top" alt="widget-card-2" onerror="this.src='https://wavebox.net/static/media/SNP.2e344aaeb9b078ecddb8.jpg';">
                    <div class="card-body">
                        <p class="meta-date">{{ $product->created_at }}</p>

                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->sub_title }}</p>

                        <div class="meta-info">
                            <div class="meta-user">
                                {{-- <div class="avatar avatar-sm">
                                    <span class="avatar-title rounded-circle">AG</span>
                                </div> --}}
                                <div class="user-name">
                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-info btn-sm">View Demo</a>
                                </div>
                            </div>

                            <div class="meta-action">
                                <div class="meta-likes">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                        </path>
                                    </svg> 51
                                </div>

                                <div class="meta-view">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg> 250
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('js')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('thumbnail')
        //Second upload
        var secondUpload = new FileUploadWithPreview('screenshort')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@endpush
