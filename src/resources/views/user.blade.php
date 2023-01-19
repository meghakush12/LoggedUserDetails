<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Ip Address</th>
                                <th scope="col">LogIn</th>
                                <th scope="col">LogOut</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_details as $user_detail)
                                    <tr>
                                        <td>{{$user_detail->id}}</td>
                                        <td>{{Auth::user()->name}}</td>
                                        <td>{{$user_detail->ip_address}}</td>
                                        <td>{{$user_detail->login_at}}</td>
                                        <td>{{$user_detail->logout_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

