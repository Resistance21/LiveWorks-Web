@props(['units'])
<div class="space-y-2">
    @foreach ($units as $unit)
        {{-- {{ dd($unit->assessmentsByYear) }} --}}
        <details class="group space-y-2 [&_summary::-webkit-details-marker]:hidden" open>
            <summary
                class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 font-medium text-gray-900 hover:bg-gray-50">
                <span>{{ $unit->unit_name }}</span>

                <svg aria-hidden="true" class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </summary>

            @foreach ($unit->assessmentsByYear as $year => $assessmentsInYear)
                <div class="space-y-2 pl-4">
                    <details class="group/year [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                            <span>{{ $year }}</span>

                            <svg aria-hidden="true"
                                class="size-4 shrink-0 transition-transform duration-300 group-open/year:-rotate-180"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        @foreach ($assessmentsInYear as $assessment)
                            <div class="space-y-2 pl-4">
                                <details class="group/assessment [&_summary::-webkit-details-marker]:hidden">
                                    <summary
                                        class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                                        <span>{{ $assessment->name }}</span>

                                        <svg aria-hidden="true"
                                            class="size-4 shrink-0 transition-transform duration-300 group-open/assessment:-rotate-180"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </summary>
                                    @foreach ($assessment->projects as $project)
                                        <div class="p-4">
                                            {{ $project->name }}

                                        </div>
                                    @endforeach
                                </details>
                            </div>
                        @endforeach
                    </details>
                </div>
            @endforeach
        </details>
    @endforeach

</div>
