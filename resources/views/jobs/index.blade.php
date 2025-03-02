<x-layout>
    <x-slot:heading>
        {{$heading}}
    </x-slot:heading>


    <div class="space-y-2">
        @foreach($jobs as $job)
            <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border border-gray-200">
                <div class="font-bold text-sm text-blue-700">{{$job->employer->name}}</div>
                <strong> {{$job['title']}}: </strong> pays {{$job['salary']}} per year


            </a>

        @endforeach
    </div>

   <div class="mt-3 text-gray-800"> {{ $jobs->links() }}</div>

</x-layout>
