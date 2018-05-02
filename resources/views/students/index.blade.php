@extends('layouts/master')
    @include('layouts/nav') 
@section('content')

<div class="w-full">
    <div class="container mx-auto">
        <div class="tracking-tight font-xs mb-4">
            <a href="/" class="no-underline font-medium text-black hover:text-blue-dark">
                &larr; back
            </a>
        </div>

        <div class="p-8 w-full shadow-lg bg-grey-lightest border border-t border-grey-lighter">
            <div class="mb-4 flex justify-center">
    @include('/students/_tabs')
            </div>

            <div class="flex justify-center">
                <table class="text-left m-4" style="border-collapse:collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                                Firstname
                            </th>
                            <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                                Lastname
                            </th>
                            <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                                E-mail
                            </th>
                            <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                                Phone number
                            </th>
                            <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                                Start date
                            </th>
                            <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                                End date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)

                        <tr class="hover:bg-blue-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">
                                {{ $user->firstname }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light text-center">
                                {{ $user->lastname }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light text-center">
                                {{ $user->email }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light text-center">
                                {{ $user->phone }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light text-center">
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light text-center">10 May 2018</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection