@extends('backend.layouts.app')

@section('title', __('Session logins'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            <strong style="color: #0061f2;"> @lang('Session logins') </strong>

            <div class="mt-2">
                <livewire:backend.date-range />
            </div>
        </x-slot>

        <x-slot name="headerActions">
        </x-slot>

        <x-slot name="body">
            <livewire:backend.logged.logged-table />
        </x-slot>
    </x-backend.card>

    <livewire:backend.logged.show-logged />

@endsection