@extends('layouts.layout')
@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <P>
        <?php echo $msg ? $msg : 'Please try later.'; ?>
    </P>
</div>

@endsection