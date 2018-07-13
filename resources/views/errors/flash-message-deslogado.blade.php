@if(\Session::has('success'))
{{ \Session::get('success') }}
{{ \Session::forget('success') }}
@endif


@if(\Session::has('error'))
{{ \Session::get('error') }}
{{ \Session::forget('error') }}
@endif


@if(\Session::has('warning'))
{{ \Session::get('warning') }}
{{ \Session::forget('warning') }}
@endif


@if(\Session::has('info'))
{{ \Session::get('info') }}
{{ \Session::forget('info') }}
@endif


@if ($errors->any())
ATENÇÃO:<br><br>
@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
@endif