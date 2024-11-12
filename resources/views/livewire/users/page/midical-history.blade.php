<div>
    <div class="card-health padding">

        <a href="{{ route('MedicalHistory.create', ['code' => Session::get('pet-code')]) }}">
            <i class='bx bx-plus add-icon'></i>
        </a>
        <div class="settings-dropdown">
            <i class='bx bx-cog settings-icon'></i>
            <div class="settings-menu">
                <ul>
                    @foreach (config('menu') as $menu)
                        <li>
                            <a href="{{ $menu['route'] != '#' ? route($menu['route'], ['code' => Session::get('pet-code')]) : '#' }}"
                                class="menu-option">
                                <div class="text">{{ __($menu['label']) }}</div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="top-table">
            <label class="header" style="font-size: 20px">{{ __('messages.medical_history') }}</label>
            <div class="show-field mt-1 search">
                <div class="input-group mt-1">
                    <input type="text" class="input-field" placeholder="{{ __('messages.search') }}"
                        wire:model.live='search'></input>
                </div>
            </div>
        </div>
 
        <table>
            <thead>
                <tr>
                    <th scope="col" class="text-left">{{ __('messages.diagnosis') }}</th>
                    <th scope="col" class="text-left">{{ __('messages.treatment_provided') }}</th>
                    <th scope="col" class="text-left">{{ __('messages.medications') }}</th>
                    <th scope="col">{{ __('messages.pet_age') }}</th>
                    <th scope="col">{{ __('messages.treatmentDate') }}</th>
                    <th scope="col" style="width: 80px">{{ __('messages.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataList as $item)
                    <tr>
                        <td scope="row" data-label="{{ __('messages.diagnosis') }}" class="text-left">
                            {{ $item->diagnosis ?? '-' }}
                        </td>
                        <td scope="row" data-label="{{ __('messages.treatment_provided') }}" class="text-left">
                            {{ $item->treatment ?? '-' }}
                        </td>
                        <td scope="row" data-label="{{ __('messages.medications') }}" class="text-left">
                            {{ $item->medications ? $item->medications : '-' }}
                        </td>
                        
                        <td data-label="{{ __('messages.pet_age') }}">
                            @php
                                if ($pet_age && $item->treatment_date) {
                                    $startDate = \Carbon\Carbon::createFromFormat(
                                        'Y-m-d H:i:s',
                                        $pet_age,
                                    )->startOfDay();
                                    $endDate = \Carbon\Carbon::createFromFormat(
                                        'Y-m-d',
                                        $item->treatment_date,
                                    )->startOfDay();

                                    if ($endDate < $startDate) {
                                        echo __('messages.invalid_data');
                                    } else {
                                        $age = $startDate->diff($endDate);

                                        if ($age->y > 0) {
                                            echo "{$age->y} " .
                                                __('messages.years') .
                                                " {$age->m} " .
                                                __('messages.months');
                                        } else {
                                            echo "{$age->m} " . __('messages.months');
                                        }
                                    }
                                } else {
                                    echo __('messages.incomplete_data');
                                }
                            @endphp
                        </td>
                        <td data-label="{{ __('messages.treatmentDate') }}">
                            {{$item->treatment_date?(\Carbon\Carbon::parse($item->treatment_date)->format('d/m/Y')) : '-' }}</td>

                        <td data-label="{{ __('messages.action') }}" class="action">
                            <a href="{{ route('MedicalHistory.edit', ['code' => Session::get('pet-code'), 'id' => $item->id]) }}"
                                class="edit"><i class='bx bx-edit-alt'></i></a>
                            <a href="#" class="remove" wire:click='remove({{ $item->id }})'><i
                                    class='bx bx-trash'></i></a>
                        </td>
                    </tr>
                @endforeach
                @if (count($dataList) == 0)
                    <tr>
                        <td colspan='6'>{{ __('messages.not_found_data') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
