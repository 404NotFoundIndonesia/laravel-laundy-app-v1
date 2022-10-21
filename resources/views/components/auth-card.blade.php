<div class="container pt-5">
    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-sm-12 col-lg-6 bg-dark">
                    <img 
                        src="https://avatars.githubusercontent.com/u/87377917" 
                        alt="{{ config('app.name') }}" 
                        class="d-none d-lg-block mx-auto"
                    >
                </div>
                <div class="col-sm-12 col-lg-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>