@extends('layouts.default')

@section('title')
Home
@stop

@section('content')
   <p>i am the home page</p>

   {{auth()->user()->name}}
   <br>
   <button type='button' onclick="location.href=&#34;{{ route('logout.perform') }}&#34;" class="btn btn-danger">Logout</button>

   <button type='button' onclick="location.href=&#34;{{ route('products') }}&#34;" class="btn btn-primary">Products</button>
   
   <button type='button' onclick="location.href=&#34;{{ route('messages') }}&#34;" class="btn btn-primary">Messages</button>

@stop
