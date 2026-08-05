@extends('components.layouts.dashboard')

@section('title', __('Gallery::words.gallery_list'))

@section('content')

    <div class="row">

        <div class="col-xl-12">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h3 class="card-title">
                        {{ __('Gallery::words.gallery_list') }}
                    </h3>

                    <a href="{{ route('dashboard.galleries.create') }}"
                       class="btn btn-primary">

                        <i class="fe fe-plus"></i>

                        {{ __('Gallery::words.create_gallery') }}

                    </a>

                </div>


                <div class="card-body">


                    @if(session('success'))

                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif


                    <div class="table-responsive">

                        <table class="table table-bordered text-nowrap">

                            <thead>

                            <tr>

                                <th>
                                    #
                                </th>


                                <th>
                                    {{ __('Gallery::words.image') }}
                                </th>


                                <th>
                                    {{ __('Gallery::words.fa_title') }}
                                </th>


                                <th>
                                    {{ __('Gallery::words.en_title') }}
                                </th>


                                <th>
                                    {{ __('Gallery::words.sort_order') }}
                                </th>


                                <th>
                                    {{ __('Gallery::words.status') }}
                                </th>


                                <th>
                                    {{ __('Gallery::words.actions') }}
                                </th>


                            </tr>

                            </thead>



                            <tbody>


                            @forelse($galleries as $gallery)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>



                                    <td>

                                        @if($gallery->image)

                                            <img src="{{ asset('storage/'.$gallery->image) }}"
                                                 width="80"
                                                 height="60">
                                        @else

                                            -

                                        @endif

                                    </td>



                                    <td>
                                        {{ $gallery->fa_title }}
                                    </td>


                                    <td>
                                        {{ $gallery->en_title }}
                                    </td>


                                    <td>
                                        {{ $gallery->sort_order }}
                                    </td>



                                    <td>

                                        @if($gallery->status)

                                            <span class="badge bg-success">
                                            {{ __('Gallery::words.active') }}
                                        </span>

                                        @else

                                            <span class="badge bg-danger">
                                            {{ __('Gallery::words.inactive') }}
                                        </span>

                                        @endif

                                    </td>



                                    <td>


                                        <a href="{{ route('dashboard.galleries.show',$gallery) }}"
                                           class="btn btn-sm btn-info">

                                            <i class="fe fe-eye"></i>

                                        </a>



                                        <a href="{{ route('dashboard.galleries.edit',$gallery) }}"
                                           class="btn btn-sm btn-warning">

                                            <i class="fe fe-edit"></i>

                                        </a>



                                        <form action="{{ route('dashboard.galleries.destroy',$gallery) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')


                                            <button type="submit"
                                                    onclick="return confirm('{{ __('Gallery::words.delete_confirm') }}')"
                                                    class="btn btn-sm btn-danger">

                                                <i class="fe fe-trash"></i>

                                            </button>


                                        </form>


                                    </td>


                                </tr>


                            @empty

                                <tr>

                                    <td colspan="7"
                                        class="text-center">

                                        {{ __('Gallery::words.no_data') }}

                                    </td>

                                </tr>

                            @endforelse


                            </tbody>


                        </table>


                    </div>


                    <div class="mt-3">

                        {{ $galleries->links() }}

                    </div>


                </div>


            </div>

        </div>

    </div>
@endsection
