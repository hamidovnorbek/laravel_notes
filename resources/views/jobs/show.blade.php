<x-layout>
    <x-slot:heading>
        Job Info
    </x-slot:heading>

    <h2>{{$job['title']}}</h2>
    <p>{{$job['salary']}}</p>

    <p class="mt-4"><x-button href="/jobs/{{$job['id']}}/edit">Edit</x-button></p>

</x-layout>
