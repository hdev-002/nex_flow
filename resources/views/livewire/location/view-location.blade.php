<div>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="d-flex align-items-center">
            <a href="{{ route('locations.list') }}" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px btn-active-light-secondary"><i class="fa-solid fa-arrow-left"></i></a>
            <span class="fw-bolder fs-2 ms-2">#{{ $location->code }}</span>
            <span wire:loading class="text-secondary-emphasis ms-2"> <i class="fa fa-spinner fa-spin"></i> Saving Draft...</span>
        </span>
    </div>

    <div class="card card-flush pt-3 mb-5 flex-row-fluid w-md-700px shadow-none border-0">
        <div class="card-body pt-0">
            <div class="mb-3">
                <div class="d-flex flex-wrap py-5">
                    <div class="flex-equal me-5">
                        <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                            <tbody>
                            <!-- Name and Code -->
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Name:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->name ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Code:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->code ?? '-' }}
                                </td>
                            </tr>

                            <!-- New Fields -->
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Parent ID:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->parent_id ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Location Type:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->location_type ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Status:</td>
                                <td class="text-gray-800 min-w-200px">
                                  <span class="badge {{ $location->status ? 'badge-light-success' : 'badge-light-danger' }}">
                                        {{ $location->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Address:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->address ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Latitude:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->latitude ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Longitude:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->longitude ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Created By:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->created_by ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Updated By:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->updated_by ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">Deleted By:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $location->deleted_by ?? '-' }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Map View -->
                <div class="mt-5">
                    <h5 class="fw-bold">Location Map</h5>
{{--                    <div id="location-map" style="height: 100px; width: 100px;"></div>--}}
                </div>

            </div>
        </div>
    </div>

    <div class="card card-flush pt-3 mb-5 flex-row-fluid w-md-700px shadow-none border-0">
        <div class="card-header">
            <h3 class="card-title fw-bolder fs-3">Location Details</h3>
        </div>
        <div class="card-body pt-0">
            <!-- Add this below the existing table in the Blade view -->
            @if($childLocations->isNotEmpty())
                <div class="mt-5">
                    <h5 class="fw-bold">Child Locations</h5>
                    <ul>
                        @foreach($childLocations as $child)
                            <li>
                                {{ $child->name }}
                                @if($child->children->isNotEmpty())
                                    <ul>
                                        @foreach($child->children as $grandChild)
                                            <li>{{ $grandChild->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
