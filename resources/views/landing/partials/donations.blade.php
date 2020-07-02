@foreach ($donations as $donation)
    <div class="col-md-4">
        <div class="card donated">
            <div class="card-body">
                <h4 class="text-primary"> {{$donation->name}} </h4>
                <h5> <span class="calibri">{{number_format($donation->amount)}}</span> تومان </h5>
                <hr>
                <p class="text-rose"> {{$donation->info ?? 'بدون متن'}} </p>
                <p>
                    <b class="text-primary"> پاسخ ادمین :  </b>
                    <span class="text-muted"> {{$donation->reply ?? 'بدون پاسخ'}} </span>
                </p>
            </div>
        </div>
    </div>
@endforeach
