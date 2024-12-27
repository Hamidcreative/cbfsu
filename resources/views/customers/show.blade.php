<x-app-layout>
    <x-slot name="title">
        {{$customer->user->name}} {{ __('Details') }}
    </x-slot>
    <style>
        .blockquote-footer {
            margin-bottom: 0.5rem;
        }
        .blockquote > :last-child {
            font-size: 14px;
        }
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>
    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-1" type="button" class="btn btn-success btn-circle"><i class="circle" aria-hidden="true"></i></a>
                    <p>Principal Information</p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle"><i class="circle" aria-hidden="true"></i></a>
                    <p>Indemnities</p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle"><i class="circle" aria-hidden="true"></i></a>
                    <p>Surety Details</p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle"><i class="circle" aria-hidden="true"></i></a>
                    <p>Line of Authority</p>
                </div>
            </div>
        </div>
        <form action="{{route('customer.store')}}" method="POST">
            @csrf
            <div class="panel panel-primary setup-content" id="step-1">
                <div class="panel-heading">
                    <hr style="margin-top: 0;">
                    <h6 class="accordion-header mt-0" id="headingFive" style="background-color: #edf7fd;padding:15px">
                        <strong>Principal Information </strong>
                    </h6>
                </div>
                <div class="panel-body">
                    <div class="accordion-body" style="margin-bottom: 150px">
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Account Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$customer->user->name ??''}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$customer->address ??''}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address 2</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$customer->address2 ??''}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">State</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$customer->state->name ??''}}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">City</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$customer->city->name ??''}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Zip</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$customer->zip ??''}}</p>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Primary Contact </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$customer->primary_contact ??''}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$customer->phone ??''}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$customer->user->email}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Corporation Type</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{corporation_types()[$customer->corporation_type] ??''}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Average Project Size </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{'$' . number_format($customer->average_size, 2) ??''}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Largest Project Size </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{'$' . number_format($customer->largest_size, 2) ??''}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Largest Backlog </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{'$' . number_format($customer->backlog, 2) ??''}}</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    @include('layouts.stepform.footer_for_details',['first'=>true, 'last' => false])
                </div>
            </div>
            <div class="panel panel-primary setup-content" id="step-2">
                <div class="panel-heading">
                    <hr style="margin-top: 0;">
                    <h6 class="accordion-header mt-0" id="headingFive" style="background-color: #edf7fd;padding:15px">
                        <strong>Indemnities </strong>
                    </h6>
                </div>
                <div class="panel-body">
                    <div class="accordion-body">
                        <div class="card mb-4 mt-2">
                            <div class="card-body">
                                <table class="table customCss dataTable no-footer">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Personal Indemnitor(s)</th>
                                        <th>Corporate Indemnitor(s)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($customer)
                                        @foreach($customer->indemnitors as $key => $item)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$item->personal}}</td>
                                                <td>{{$item->corporate}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @include('layouts.stepform.footer_for_details',['first'=>false, 'last' => false])
                </div>
            </div>
            <div class="panel panel-primary setup-content" id="step-3">
                <div class="panel-heading">
                    <hr style="margin-top: 0;">
                    <h6 class="accordion-header mt-0" id="headingFive" style="background-color: #edf7fd;padding:15px">
                        <strong>Surety Details </strong>
                    </h6>
                </div>
                <div class="panel-body">
                    <div class="accordion-body">
                        <div class="card mb-4 mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"> Surety Name </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"> {{ $customer->authority->surerty->name ?? ''}}  </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"> AM Best Rating </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"> {{$customer->authority->surerty->am_best_rating ?? ''}}  </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"> Treasury Listed </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"> {{$customer->authority->surerty->treasury_list ?? ''}}  </p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"> Underwriter Name </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"> {{$customer->authority->surerty->cbu_name ?? ''}}  </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"> Underwriter Email </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"> {{$customer->authority->surerty->cbu_email ?? ''}}  </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.stepform.footer_for_details',['first'=>false, 'last' => false])
            </div>

            <div class="panel panel-primary setup-content" id="step-4">
                <div class="panel-heading">
                    <hr style="margin-top: 0;">
                    <h6 class="accordion-header mt-0" id="headingFive" style="background-color: #edf7fd;padding:15px">
                        <strong>Line of Authority </strong>
                    </h6>
                </div>
                <div class="panel-body">
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
                                        <p class="text-muted mb-0"> {{ amountFormat($customer->authority->single_job_limit??0)}}  </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Aggregate Limit  </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"> {{amountFormat($customer->authority->aggregate_limit??0)}}  </p>
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
                                        <p class="mb-0"> Warranty Period (years) </p>
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
                                        <p class="text-muted mb-0"> {{$customer->authority->minimum_bid ?? ''}} %  </p>
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
                    <div class="panel-heading">
                        <hr style="margin-top: 0;">
                        <h6 class="accordion-header mt-0" id="headingFive" style="background-color: #edf7fd;padding:15px">
                            <strong> Additional LOA Provisions </strong>
                        </h6>
                    </div>
                    <div class="panel-body ">
                        <div class="accordion-body" style="margin-bottom: 150px">
                            <div class="card  mt-2">
                                <div class="card-body">
                                    @foreach($customer->questions as $key => $quest)
                                        <?php $qv= $key+1 ?>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0"> Additional LOA Provision {!! $qv !!} </p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"> {{ $quest->question ?? ''}}  </p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.stepform.footer_for_details',['first'=>false, 'last' => true])
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
<script src="{!! asset('assets/js/jquery-ui.min.js') !!}?v=11"></script>
<script src="{!! asset('assets/js/jquery.signature.js') !!}?v=11"></script>
<script type="module">
    $(document).ready(function() {
        MultiStepFormJs(); // Include
    });
</script>

