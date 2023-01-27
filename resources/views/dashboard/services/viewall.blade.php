<x-app-layout>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css" />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('All Services') }}
                                <small style="float:right;">
                                    <a href="{{ route('service.add') }}" style="color:cyan;"
                                        title="Add Service">
                                        Add Service
                                    </a>
                                </small>
                            </h2>
                        </header>
                        <div class="mt-6 space-y-6">
                            <table class="display datatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->location }}</td>
                                            <td>{{ '$' . number_format($service->price, 2, '.', ',') }}</td>
                                            <td style="max-width: 500px;">{{ $service->description }}</td>
                                            <td style="text-align:right;min-width:55px;">
                                                <a href="{{ route('service.edit', $service->id) }}"style="margin-right:5px;display:inline-block;"
                                                    title="Edit Service">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                        height="22" fill="blueviolet" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('service.destroy', $service->id) }}"
                                                    style="display:inline-block;" title="Delete Service">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                        height="22" fill="red" class="bi bi-trash3"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Service</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                "bLengthChange": false
            });
        });
    </script>
</x-app-layout>
