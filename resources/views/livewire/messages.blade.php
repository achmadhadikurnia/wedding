<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="form-inline float-right">
                <label class="sr-only" for="search">{{ __('Search') }}</label>
                <x-jet-input id="search" class="form-control form-control-sm mb-3" wire:model="search"
                    placeholder="{{ __('Search') }}" />
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 1%" class="text-right">
                                {{ __('#') }}
                            </th>

                            <th scope="col">
                                {{ __('Nama') }}
                            </th>

                            <th scope="col">
                                {{ __('Pesan') }}
                            </th>

                            <th scope="col">
                                {{ __('Tanggal') }}
                            </th>

                            <th scope="col" style="width: 1%">
                                {{ __('Action') }}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td scope="row" class="text-right">
                                    {{ ++$i }}
                                </td>

                                <td scope="row">
                                    {{ $row->name }}
                                </td>

                                <td scope="row">
                                    {{ $row->message }}
                                </td>

                                <td scope="row">
                                    {{ $row->created_at->toDayDateTimeString() }}
                                </td>

                                <td scope="row">
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-danger"
                                            wire:click="delete({{ $row->id }})">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="table-danger text-center">
                                    {{ __('No data found!') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer clearfix">
            <div class="float-right">
                {{ $data->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>
