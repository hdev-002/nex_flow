<div>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @php
            use Illuminate\Support\Str;

            function getInitials($name)
            {
                $initials = collect(explode(' ', preg_replace('/(?<!^)[A-Z]/', ' $0', $name))) // Split camel case into words
                    ->map(fn($word) => Str::substr($word, 0, 1)) // Get the first letter of each word
                    ->implode(''); // Combine the initials

                return Str::substr($initials, 0, 3);
            }
        @endphp
        @foreach ($modules as $module)
            <div class="p-4 border border-gray-300 rounded mb-4 bg-white shadow-sm">
               <div class="d-flex align-items-center justify-content-between">
                   <div>
                       <h3 class="text-dark fw-bold mb-1">

                           <div>
                               <div class="symbol symbol-55px mb-5">
                               <span class="symbol-label fs-2 fw-semibold text-warning-emphasis bg-light-warning">
                                   {{ getInitials($module->name) }}
                               </span>
                               </div>
                               {{ $module->name }}
                               @if ($module->status === 'installed' && $type != 'installed')
                                   <span class="badge badge-light-success ms-2">Installed</span>
                               @endif
                           </div>
                       </h3>
                       <p class="text-muted mb-2">{{ $module->description }}</p>
                   </div>

                   <div class="text-end ms-9">
                       @if ($module->status === 'installed')
                           <button
                               wire:click="updateModule('{{ $module->id }}')"
                               class="btn btn-twitter btn-sm me-2"
                           >
                               <span wire:loading.remove wire:target="updateModule('{{ $module->id }}')">Update</span>
                               <span wire:loading wire:target="updateModule('{{ $module->id }}')">Updating...</span>
                           </button>
                           <button
                               wire:click="uninstallModule('{{ $module->id }}')"
                               class="btn btn-danger btn-sm me-2"
                           >
                               <span wire:loading.remove wire:target="updateModule('{{ $module->id }}')">Uninstall</span>
                               <span wire:loading wire:target="updateModule('{{ $module->id }}')">Uninstalling...</span>
                           </button>
                       @else
                           <button
                               wire:click="installModule('{{ $module->id }}')"
                               class="btn btn-facebook btn-sm"
                           >
                               <span wire:loading.remove wire:target="installModule('{{ $module->id }}')">Install</span>
                               <span wire:loading wire:target="installModule('{{ $module->id }}')">Installing...</span>
                           </button>
                       @endif
                   </div>
               </div>
                <div class="row">
                    {{-- Notification Messages --}}
                    @if (session()->has('success'.$module))
                        <div class="separator separator-content mt-3 mb-5">Message</div>
                        @foreach ($messages as $message)
                        <div class="text-gray-700 mt-2">
                            {{ $message['message'] }} : <span class="badge badge-light-{{$message['type']}}">{{$message['type']}}</span>
                        </div>
                        @endforeach
                    @endif

                    @if (session()->has('error'.$module))
                        <div class="separator separator-content mt-3 mb-5">Message</div>
                        <div class="text-gray-700">
                            {{ session('error'.$module) }}
                        </div>
                    @endif
                </div>
            </div>


        @endforeach

    </div>

</div>

@script
<script>

</script>
@endscript
