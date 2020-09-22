@extends('template')

@section('title', '')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt20">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Количество рабочих мест</th>
                        <th scope="col" class="text-center">Устройства в работе</th>
                        <th scope="col" class="text-center">На складе</th>
                        <th scope="col" class="text-center">Не рабочие</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                {{ $countWorkspaces }}
                            </td>
                            <td class="text-center">
                                {{ $devicesInOperation }}
                            </td>
                            <td class="text-center">
                                {{ $devicesInStock }}
                            </td>
                            <td class="text-center">
                                {{ $devicesNonWorking }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
