@props(['submit'])

<div class="divide-y divide-gray-200 lg:col-span-9">
    <form wire:submit.prevent="{{ $submit }}" class="">
        <div class="">{{--px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}--}}
            <div class="">
                {{ $form }}
            </div>
        </div>

        @if (isset($actions))
            <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                {{ $actions }}
            </div>
        @endif
    </form>
</div>
