<x-layout>
    <x-slot:heading>
        Job Info
    </x-slot:heading>

    <h2>{{$job['title']}}</h2>
    <p>{{$job['salary']}}</p>

    @can('edit', $job)
        <p class="mt-4"><x-button href="/jobs/{{$job['id']}}/edit">Edit</x-button></p>
    @endcan
</x-layout>
