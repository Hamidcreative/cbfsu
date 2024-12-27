
<form action="{{route("bond.store")}}" method="POST" enctype="multipart/form-data" class="multiStep">
    @csrf
        <input type="hidden" name="type" value="1">
    @if($obj)
        <input type="hidden" name="bond_id" value="{{$obj->id}}">
    @endif
    <section id="hell" class="section">
        <input type="hidden" class="form-control " name="customer_id" id="customer_id" value="{{$customer->id}}">
        <div class="panel-body mt-3">
                <div class="accordion-body">
                    <div class="card mb-4 mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Effective Date </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->authority->start_date ?? ''}}  </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Expiration Date </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->authority->expiry_date ?? ''}}  </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Single Project Limit  </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{amountFormat($customer->authority->single_job_limit??'')}} </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Aggregate Limit  </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{amountFormat($customer->authority->aggregate_limit??'')}}  </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Job Duration (Years) </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->authority->job_duration ?? ''}}  </p>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Warranty Period (Years) </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->authority->warranty_duration ?? ''}}  </p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Hazmat/Asbestos </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->authority->hazmat==true ? 'Yes' : 'No'}}  </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Design Build </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->authority->design_build==true ? 'Yes' : 'No'}}  </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Curtain Wall </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->curtain ?? ''}}  </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Glazing </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->glazing ?? ''}}  </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Solar </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->solar ?? ''}}  </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Bid Spread % </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->authority->minimum_bid ?? ''}} % </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Territory  </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{$customer->authority->province->name ?? ''}}  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        @include('bonds.sections.footer',['last' => false])
    </section>
</form>
