<div class="mb-10">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="d-flex align-items-center"><span class="fw-bolder fs-2 ms-2">Locations</span></span>

        <!--begin::Add Location-->
            <a href="{{ route('locations.create') }}" class="btn btn-sm btn-flex btn-dark align-self-center px-3">
                <i class="ki-outline ki-plus-square fs-3"></i>
                Create
            </a>
        <!--end::Add Location-->

    </div>
    <!--begin::Card-->
    <div class="card w-md-800px w-lg-1000px shadow-none border-1 border-gray-400">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <!--begin::Card header-->
        <div class="card-header border-0 ps-6 pe-0 pt-3">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                    <input type="text" wire:model.live.debounce.300ms="search" class="form-control form-control-sm w-30  0px ps-13" placeholder="Search name or code">
                    <!--begin::Spinner-->
                    <span class="position-absolute top-50 end-0 translate-middle-y lh-0 me-5" wire:loading wire:target="search" >
                     <span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
                            </span>
                    <!--end::Spinner-->

                    <!--begin::Reset-->
                    @if (!empty($search))
                        <span   wire:click="resetSearch" class="btn btn-flush btn-active-color-primary position-absolute text-gray-700 top-50 end-0 translate-middle-y lh-0 me-5">
                        x
                            <!--begin::Svg Icon | path: cross-->
                    </span>
                    @endif
                    <!--end::Reset-->
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-1 pb-5 px-5">
            <!--begin::Table-->
            <div class="dt-container dt-bootstrap5">
                <div id="" class="table-responsive">
                    <table class="table align-middle table-row-bordered fs-6">
                        <thead class="text-nowrap">
                        <tr class="fw-semibold fs-6 text-gray-900  border-bottom border-gray-200" role="row">
                            <th></th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold text-nowrap">
                        @forelse ($locations as $location)
                            <tr>
                                <td class="py-0 w-70px">
                                    <a href="{{ route('locations.update', $location->id) }}" class="btn btn-icon btn-sm">
                                        <i class="ki-outline ki-notepad-edit text-danger-emphasis fs-3"></i>
                                    </a>
                                    <button type="button" wire:confirm="Are you sure you want to delete it?" wire:click="deleteLocation({{ $location->id }})" class="btn btn-icon btn-sm">
                                        <i class="ki-outline ki-basket text-danger-emphasis fs-3"></i>
                                    </button>
                                </td>
                                <td class="py-0">
                                    <a href="{{ route('locations.view', $location->id) }}" class="text-gray-600">
                                    {{ $location->code }}
                                    </a>
                                </td>
                                <td class="py-0">
                                    <a href="{{ route('locations.view', $location->id) }}" class="text-gray-600">
                                        {{ $location->name }}
                                    </a>
                                </td>
                                <td class="py-0">{{ ucfirst($location->location_type) }}</td>
                                 <td class="py-0">
                                    <span class="badge {{ $location->status ? 'badge-light-success' : 'badge-light-danger' }}">
                                        {{ $location->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No locations found</td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
                <div class="mt-2">
                    @if($locations instanceof Illuminate\Pagination\LengthAwarePaginator)
                        {{ $locations->links('vendor.livewire.custom-pagination') }}
                    @endif
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</div>
<livewire:scripts />
@script
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('location-deleted', () => {
                toastr.success("Location deleted successfully");
            });

            Livewire.on('location-has-children', (child) => {
                Swal.fire({
                    title: 'Warning',
                    text: 'Cannot delete because it has child locations.',
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Close",
                    cancelButtonText: "See Child Locations",
                    customClass: {
                        confirmButton: "btn btn-sm btn-dark",
                        cancelButton: "btn btn-sm btn-secondary"
                    }
                }).then((result) => {

                    if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            html: `<h2 class="fw-bold text-gray-900 mb-3 text-start">Child Locations:</h2><ul class="text-start">${child[0].map(location => `<li>${location.name}</li>`).join('')}</ul>`,
                            width: 400,
                            padding: "1em",
                            buttonsStyling: false,
                            confirmButtonText: "Close",
                            customClass: {
                                confirmButton: "btn btn-sm btn-dark"
                            }
                        });
                    }
                });
            });

            Livewire.on('location-has-users', (users) => {
                Swal.fire({
                    title: 'Warning',
                    text: 'Cannot delete because it has users.',
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Close",
                    cancelButtonText: "See Users",
                    customClass: {
                        confirmButton: "btn btn-sm btn-dark",
                        cancelButton: "btn btn-sm btn-secondary"
                    }
                }).then((result) => {

                    if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            html: `<h2 class="fw-bold text-gray-900 mb-3 text-start">Linked User Account:</h2><ul class="text-start">${users[0].map(user => `<li>${user.name}</li>`).join('')}</ul>`,
                            width: 400,
                            padding: "1em",
                            buttonsStyling: false,
                            confirmButtonText: "Close",
                            customClass: {
                                confirmButton: "btn btn-sm btn-dark"
                            }
                        });
                    }
                });
            });

        });
    </script>
@endscript

