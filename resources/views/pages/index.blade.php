@extends('layouts.app')

@section('content')
<pages :categories="{{ $categories }}"></pages>
@endsection
