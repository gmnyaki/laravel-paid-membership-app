@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="bg-green-700 text-white w-full mb-1 p-5 rounded-lg flex justify-center ">
            {{ session('status') }}
    </div>
  @endif
<div class="flex h-screen">
  <!-- Side menu -->
  <div class="bg-gray-800 text-white w-64 flex-none">
    <ul class="p-4">
      <li class="mb-4">
        <a href="#" class="block py-2 px-4 text-white hover:bg-gray-700">Dashboard</a>
      </li>
      <li class="mb-4">
        <a href="#" class="block py-2 px-4 text-white hover:bg-gray-700">Reports</a>
      </li>
      <li class="mb-4">
        <a href="#" class="block py-2 px-4 text-white hover:bg-gray-700">Analytics</a>
      </li>
      <li class="mb-4">
        <a href="#" class="block py-2 px-4 text-white hover:bg-gray-700">Settings</a>
      </li>
    </ul>
  </div>
  
  <!-- Main content -->
  <div class="flex-1 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg p-6 shadow">
          <h2 class="text-lg font-bold mb-4">Card 1</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus tellus eu lectus bibendum varius.</p>
        </div>
        <!-- Card 2 -->
        <div class="bg-white rounded-lg p-6 shadow">
          <h2 class="text-lg font-bold mb-4">Card 2</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus tellus eu lectus bibendum varius.</p>
        </div>
        <!-- Card 3 -->
        <div class="bg-white rounded-lg p-6 shadow">
          <h2 class="text-lg font-bold mb-4">Card 3</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus tellus eu lectus bibendum varius.</p>
        </div>
        <!-- Card 4 -->
        <div class="bg-white rounded-lg p-6 shadow">
          <h2 class="text-lg font-bold mb-4">Card 4</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus tellus eu lectus bibendum varius.</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection