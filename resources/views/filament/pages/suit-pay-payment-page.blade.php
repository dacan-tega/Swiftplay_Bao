<x-filament-panels::page>
    <form wire:submit="submit">
        {{ $this->form }}

        <br>
        <x-filament::button type="submit" form="submit">
            {{trans('filament.Finalize_Payment')}}
        </x-filament::button>
    </form>
</x-filament-panels::page>
