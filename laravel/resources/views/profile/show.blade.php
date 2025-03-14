<x-app-layout>
<h1>{{ $profile->name }}</h1>
@foreach($profile->pictures as $picture)
<h2>{{ $picture->title }}</h2>
<a href="{{url('/dashboard')}}"><button type="button" class="text-white px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 font-semibold">Back</button></a>
@endforeach
</x-app-layout>