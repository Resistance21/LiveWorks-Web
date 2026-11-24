<x-app-layout>
    @include('unit.partials.edit-form', [
        'updateRoute' => route('staff.unit.update', [
            'unit' => $unit,
        ]),
        'unit' => $unit,
    ])
</x-app-layout>
