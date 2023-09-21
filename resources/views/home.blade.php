@extends('layouts.app')
@section('content')
    <div class="title">
        Dashboard
    </div>
        <a href="https://time.is/Samarinda" id="time_is_link" rel="nofollow" style="font-size:12px"></a>
        <span id="Samarinda_z42b" style="font-size:12px"></span>
        <script src="//widget.time.is/en.js"></script>
        <script>
            time_is_widget.init({Samarinda_z42b:{template:"TIME<br>DATE", time_format:"12hours:minutes:secondsAMPM", date_format:"dayname, monthname dnum, year"}});
        </script>
        <div id="time"></div>
        <div class="row same-height mt-3">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
            </div>
        </div>
@endsection
