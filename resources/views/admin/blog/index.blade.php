@extends('layout.admin')
@section('title')
    בלוגים
@endsection
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title"> בלוגים </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">דף ניהול</a></li>
                            <li class="breadcrumb-item active"> בלוגים </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div><br><br>
                            @endif
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>כותרת</th>
                                            <th>תת-כותרת</th>
                                            {{-- <th>תיאור</th> --}}
                                            <th>תמונה</th>
                                            <th class="text-right">בלוג ראשי</th>
                                            {{-- <th>מחיקה</th>  --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($blogs) > 0)
                                            <tr>
                                                @foreach ($blogs as $blog)
                                                    <td>
                                                        {{ $blog->title }}
                                                    </td>
                                                    <td>
                                                        {{ $blog->sub_title }}
                                                    </td>
                                                    {{-- <td>
														{{ $blog->description}}
													</td> --}}
                                                    <td>
                                                        <img src="{{ asset('blog/' . $blog->image) }}" width="100px"
                                                            height="100px">
                                                    </td>

                                                    <td class="text-right">
                                                        <div class="tw-flex tw-justify-center tw-items-center">
                                                            @if ($blog->is_primary)
                                                                <button type="submit" class="btn !tw-text-2xl p-0" name="status"
                                                                    value="0"><i
                                                                        class="fa fa-check-circle tw-text-green-600"></i></button>
                                                            @else
                                                                <form action="{{ route('select-primary-blog', $blog->id) }}"
                                                                    method="POST">
                                                                    @csrf()
                                                                    <button type="submit" class="btn !tw-text-2xl p-0" name="status"
                                                                        value="1"><i
                                                                            class="fa fa-circle-o tw-text-gray-400"></i></button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </td>

                                                    {{-- <td>
                                                        <form method="POST"
                                                            action="{{ route('category.destroy', $blog->id) }}"
                                                            id="form_{{ $blog->id }}">
                                                            @method('Delete')
                                                            @csrf()

                                                            <button type="submit" id="{{ $blog->id }}"
                                                                class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
                                                                <i class="fe fe-trash"></i> מחק
                                                            </button>
                                                        </form>
                                                    </td> --}}
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" style="text-align: center;"><strong> אין בלוגים </strong>
                                            </td>
                                        </tr>
                                        @endif
                                    <tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
@section('js')
@endsection
