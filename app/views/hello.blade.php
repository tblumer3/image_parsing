@extends('layouts.master')

@section('content')
	<div>
		<a href="<?= $url ?>">Start Parsing Images</a>
	</div>

    <div>
        <select id="download_count">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="all">All</option>
        </select>
        <button type="button" class="btn btn-default btn-link2" aria-label="Left Align">
            <a href="<?= route('data_dump'); ?>?count=">Download Last Processed Images</a>
        </button>
    </div>
    <script>
    //wrap in a page onload

    //get the href

    //get the download_count

    //do it
    </script>
@stop