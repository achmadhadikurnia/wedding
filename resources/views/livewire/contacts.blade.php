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
                                {{ __('Telepon') }}
                            </th>

                            <th scope="col">
                                {{ __('Jabatan') }}
                            </th>

                            <th scope="col">
                                {{ __('Alamat') }}
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
                                    {{ $row->phone }}
                                </td>

                                <td scope="row">
                                    {{ $row->job_title }}
                                </td>

                                <td scope="row">
                                    {{ $row->address }}
                                </td>

                                <td scope="row">
                                    <div class="btn-group btn-group-sm">
                                        <a href="https://api.whatsapp.com/send?phone={{ $row->phone }}&text=Lihat%20Undangan%3A%20*https%3A%2F%2Fbit.ly%2Fjami-hadi*%0A%0AAssalamualaikum%20Wr.%20Wb%0ABapak%2FIbu%20%3A%20*{{ $row->name }}*%0A%0ABismillahirrahmanirrahim.%0A%0ADengan%20memohon%20Ridho%20serta%20Rahmat%20Allah%20SWT%20dan%20tanpa%20mengurangi%20rasa%20hormat%20dan%20ta'dzim%2C%20kami%20bermaksud%20mengundang%20keluarga%20besar%20bapak%2Fibu%2Fsaudara%2Fi%20untuk%20dapat%20menghadiri%20Akad%20Nikah%20dan%20Resepsi%20pernikahan%20kami%20%3A%0A%0A*Jamiati%20Ramdiah%2C%20S.Ak*%0APutri%20Pertama%20dari%20Bapak%20Saman%20dan%20Ibu%20Sunaiah%0A%0ADengan%0A%0A*Achmad%20Hadi%20Kurnia%2C%20S.Kom*%0APutra%20Pertama%20dari%20Bapak%20Ues%20Kurni%20dan%20Ibu%20Eneng%20Ida%0A%0AKami%20memohon%20do'a%20serta%20kehadiran%20bapak%2Fibu%2Fsaudara%2Fi%20pada%20pernikahan%20kami%20yang%20insyaallah%20akan%20dilaksanakan%20pada%20%3A%0A%0AHari%2FTanggal%20%3A%20*Rabu%2C%2028%20Juli%202021*%0AAkad%20%26%20Resepsi%20%3A%20*09.00%20WIB%20s%2Fd%20Selesai*%0ATempat%20%3A%20*Kp.%20Cibungur%20RT%2008%20RW%2003%20Desa%20Cidadap%20Kec.%20Curugbitung%20Kab.%20Lebak%20Provinsi%20Banten*%0APeta%20%3A%20https%3A%2F%2Fbit.ly%2Fjamihadi%0A%0AMerupakan%20suatu%20kehormatan%20dan%20kebahagiaan%20bagi%20kami%20apabila%20bapak%2Fibu%2Fsaudara%2Fi%20berkenan%20untuk%20hadir%20dan%20memberikan%20restu%20kepada%20kami.%0A%0ATerimakasih.%0A%0AWassalamu'alaikum%20Wr.%20Wb"
                                            target="_BLANK" class="btn btn-primary">
                                            Send
                                        </a>

                                        <button type="button" class="btn btn-secondary"
                                            wire:click="edit({{ $row->id }})">
                                            Edit
                                        </button>

                                        <button type="button" class="btn btn-danger"
                                            wire:click="delete({{ $row->id }})">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="table-danger text-center">
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
