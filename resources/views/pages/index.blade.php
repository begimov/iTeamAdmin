@extends('layouts.app')

@section('content')
<pages :categories="{{ $categories }}" :themes="{{ $themes }}"></pages>
@endsection
