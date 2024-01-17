@extends('master')

@section('content')
<div class="grid grid-cols-2 gap-4">

<div class="container mx-auto m-2 p-2 border-2 border-gray rounded">
    <div class="text-red-500">{{session('error_bucket')}}</div>
    <h1>Create Bucket</h1>
    <form action="{{route('buckets.store')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" name="name" id="name" type="text" placeholder="name" value="{{old('name')}}">
            @error('name')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="volume">
                Volume (in inches)
            </label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('volume') border-red-500 @enderror" name="volume" id="volume" type="text" placeholder="volume" value="{{old('volume')}}">
            @error('email')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        

        <button type="submit" class="bg-blue-500 block m-2 p-2 text-white hover:bg-blue-700 rounded">Save</button>

    </form>


</div>

<div class="container mx-auto m-2 p-2 border-2 border-gray rounded">
    <div class="text-red-500">{{session('error_ball')}}</div>
    <h1>Create Ball</h1>
    <form action="{{route('balls.store')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" name="name" id="name" type="text" placeholder="name" value="{{old('name')}}">
            @error('name')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="volume">
                Volume (in inches)
            </label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('volume') border-red-500 @enderror" name="volume" id="volume" type="text" placeholder="volume" value="{{old('volume')}}">
            @error('email')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        

        <button type="submit" class="bg-blue-500 block m-2 p-2 text-white hover:bg-blue-700 rounded">Save</button>

    </form>


</div>

<div class="container mx-auto m-2 p-2 border-2 border-gray rounded">
    <div class="text-red-500">{{session('error_suggestion')}}</div>
    <h1>Bucket Suggestion</h1>
    <form action="{{route('bucketSuggestions.store')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @foreach($balls as $ball)
        <div class="mb-4 flex">
            <label class="block text-gray-700 text-sm font-bold mb-2 mx-2" for="name">
                {{$ball->name}}
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" name="{{$ball->name}}" id="name" type="text" placeholder="Number of balls" value="{{old('name')}}">
            @error('name')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>   
        @endforeach    

        <button type="submit" class="bg-blue-500 block m-2 p-2 text-white hover:bg-blue-700 rounded">Place balls in bucket</button>

    </form>


</div>

<div class="container mx-auto m-2 p-2 border-2 border-gray rounded">
    <h1>Result of balls cannot accomodate</h1>
    <div class="text-red-500">{{session('success_suggestion')}}</div>



</div>
</div>




@endsection