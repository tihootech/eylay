@foreach ($donations as $donation)
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="text-primary"> {{$donation->name}} </h4>
                <h5> <span class="calibri">{{number_format($donation->amount)}}</span> تومان </h5>
                <hr>
                <p class="text-rose"> {{$donation->info}} </p>
                <p>
                    <b class="text-primary"> پاسخ ادمین :  </b>
                    <span class="text-muted"> {{$donation->reply}} </span>
                </p>
            </div>
        </div>
    </div>
@endforeach
