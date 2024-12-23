<x-app-layout>
    <x-slot name="title">
        {{ __('Edit Customer') }}
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
        .fa-fw {
            width: 1.28571429em;
            text-align: center;
            float: right;
            margin: -26px 11px;
        }
    </style>
    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-1" type="button" class="btn btn-success btn-circle"><i class="circle" aria-hidden="true"></i></a>
                    <p> Principal Information</p>
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
        <form action="{{route('customer.update')}}" method="POST">
            @csrf
            <div class="panel panel-primary setup-content" id="step-1">
                <div class="panel-heading">
                    <hr style="margin-top: 0;">
                    <h6 class="accordion-header mt-0" id="headingFive" style="background-color: #edf7fd;padding:15px">
                        <strong> Principal Information </strong>
                    </h6>
                </div>
                <div class="panel-body">
                    <div class="accordion-body">
                        <div class="card mb-4 mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" class="form-control" placeholder="Name" id="cust_id" name="cust_id" value="{!! $customer->id !!}">
                                    <input type="hidden" class="form-control" placeholder="Name" id="user_id" name="user_id" value="{!! $customer->user_id !!}">

                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">Account Name <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{!! $customer->user->name !!}">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="address" class="form-label">Address <span class="req text-danger">*</span></label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Address" rows="1">{!! $customer->address !!}</textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="address2" class="form-label">Address 2<span class="req text-danger">*</span></label>
                                        <textarea class="form-control" id="address2" name="address2" placeholder="Address 2" rows="1"> {!! $customer->address2 !!} </textarea>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">State<span class="req text-danger">*</span></label>
                                        <select target='select[name="city_id"]' placeholder="Select City"
                                                url="{!! route('state.get-cities') !!}" params="province_id" name="province_id"
                                                class="form-select changeInputMws input_province_id select2selector">
                                            <option value="0">Select State</option>
                                            @foreach($provinces as $row)
                                                <option value="{!! $row->id !!}" @selected($customer->state_id == $row->id)>{!! $row->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="city_id" class="form-label">City<span class="req text-danger">*</span></label>
                                        <select name="city_id" class="form-select city_id_selector select2selector">
                                            <option value="0">Select City</option>
                                            @foreach($cities as $row)
                                                <option value="{!! $row->id !!}" @selected($customer->city_id == $row->id)>{!! $row->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="zip" class="form-label">Zip <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" value="{!! $customer->zip !!}" maxlength="5" pattern="\d{5}"/>
                                    </div>


                                    <div class="col-md-4 mb-3">
                                        <label for="primary_contact" class="form-label">Primary Contact <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control phoneNo" id="primary_contact" name="primary_contact" value="{!! $customer->primary_contact !!}"
                                               maxlength="12" placeholder="000-000-0000" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="phone" class="form-label">Phone <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control phoneNo" id="phone" name="phone" value="{!! $customer->phone !!}"
                                               maxlength="12" placeholder="000-000-0000" />
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="email" class="form-label">Email <span class="req text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="{!! $customer->user->email !!}" placeholder="Email"/>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="corporation_type" class="form-label">Corporation Type <span class="req text-danger">*</span></label>
                                        <select  placeholder="Select Corporation Type" class="form-select select2selector" id="corporation_type" name="corporation_type">
                                            <option value="0"> Select Corporation Type</option>
                                            @foreach(corporation_types() as $key => $position)
                                                <option value="{{$key}}" @selected($customer->corporation_type == $key)>{{$position}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="size" class="form-label">Average Project Size <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control monetary" id="size" name="average_size" value="{!! $customer->average_size !!}" placeholder="$0.00"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="largest_size" class="form-label">Largest Project Size <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control monetary" id="largest_size" name="largest_size" value="{!! $customer->largest_size !!}" placeholder="$0.00"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="backlog" class="form-label">Largest Backlog <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control monetary" id="backlog" name="backlog" value="{!! $customer->backlog !!}" placeholder="$0.00"/>
                                    </div>

                                    <div class="col-md-4 mb-0 " toggle="password-parent" style="position: relative">
                                        <label class=" control-label">Password <span class="req text-danger">*</span></label>
                                        <input id="password-field" type="password" class="form-control" name="password">
                                        <span class="fa fa-fw fa-eye-slash field-icon toggle-password"> </span>
                                    </div>

                                    <div class="col-md-4 mb-3 " toggle="password-parent" style="position: relative">
                                        <label for="password_confirmation" class="form-label">Confirm Password <span class="req text-danger">*</span></label>
                                        <input id="password_confirmation" type="password" class="form-control password"
                                               name="password_confirmation">
                                        <span class="fa fa-fw fa-eye-slash field-icon toggle-password"> </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.stepform.footer',['last' => false])
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
                    <div class="accordion-body mb-5">
                        @if($customer)
                            @if(count($customer->indemnitors)>0)
                                @foreach($customer->indemnitors as $key => $indemnitor)
                                    <x-append-indemnitor :itemCount="$key+1" :indemnitor="$indemnitor"/>
                                @endforeach
                            @else
                                <x-append-indemnitor itemCount="1" :indemnitor="0"/>
                            @endif
                        @else
                            <x-append-indemnitor itemCount="1" :indemnitor="0"/>
                        @endif
                        <div class="indemnitors_list"></div>

                        <button class="btn btn-success btn-xs " type="button" id="add-indemnitor">+ Add More</button>
                    </div>
                    @include('layouts.stepform.footer',['last' => false])
                </div>
            </div>
            <div class="panel panel-primary setup-content" id="step-3">
                <div class="panel-heading">
                    <hr style="margin-top: 0;">
                    <h6 class="accordion-header mt-0" id="headingFive" style="background-color: #edf7fd;padding:15px">
                        <strong>Surety </strong>
                    </h6>
                </div>
                <div class="panel-body">
                    <div class="accordion-body">
                        <div class="card mb-4 mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label ">Surety Name <span class="req text-danger">*</span> </label>
                                        <select  params="surety_id"
                                                 append="0"
                                                 url="{!! route('surety_details.append') !!}"
                                                 method="post"
                                                 target_div="suretyDetails"
                                                 class="select2selector input_surety_id form-select js-example-basic-single ajax_load_select"
                                                 name="insurer">
                                            <option value=""> Surety Name</option>
                                            @foreach($insurers as $insurer)
                                                <option value="{!! $insurer['id'] !!}" @selected($authority->surerty->id == $insurer['id'])> {!! $insurer->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="suretyDetails">
                                    {{--                                    <x-surety-form  />--}}
                                    @if(isset($authority->surerty->id))

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="rating" class="form-label">AM Best Rating<span class="req text-danger">*</span></label>
                                                <input type="text" class="form-control" id="rating" name="rating" placeholder="AM Best Rating" value="{{$authority->surerty->am_best_rating}}"/>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="treasury_list" class="form-label">Treasury Listed <span class="req text-danger">*</span></label>
                                                <input type="text" class="form-control" id="treasury_list" name="treasury_list" placeholder="Treasury Listed" value="{{$authority->surerty->treasury_list}}"/>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="underwriter_name" class="form-label">Underwriter Name<span class="req text-danger">*</span></label>
                                                <input type="text" class="form-control" id="underwriter_name" name="underwriter_name" placeholder="Underwriter Name"value="{{$authority->surerty->cbu_name}}"/>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="underwriter_phone" class="form-label">Underwriter Phone<span class="req text-danger">*</span></label>
                                                <input type="text" class="form-control phoneNo" id="underwriter_phone" name="underwriter_phone"  maxlength="12" placeholder="000-000-0000" value="{{$authority->surerty->cbu_phone}}"/>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="underwriter_email" class="form-label">Underwriter Email<span class="req text-danger">*</span></label>
                                                <input type="text" class="form-control" id="underwriter_email" name="underwriter_email" placeholder="Underwriter Email" value="{{$authority->surerty->cbu_email}}"/>
                                            </div>
                                        </div>
                                    @endif
                                    {{--                                    <x-surety-form  />--}}

                                </div>

                            </div>
                        </div>
                    </div>
                </div>





                @include('layouts.stepform.footer',['last' => false])
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
                                    <input type="hidden" class="form-control" id="authority_id" name="authority_id" value="{{$authority->id}}" />

                                    <div class="col-md-4 mb-3">
                                        <label for="start_date" class="form-label ">Effective Date <span class="req text-danger">*</span> </label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{$authority->start_date}}" placeholder="Effective Date"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="exp_date" class="form-label">Expiration Date <span class="req text-danger">*</span></label>
                                        <input type="date" class="form-control" id="exp_date" name="exp_date" placeholder="Expiration Date" value="{{$authority->expiry_date}}"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Single Project Limit <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Single Job Limit" name="single_limt" value="{{$authority->single_job_limit}}"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="number" class="form-label">Aggregate Limit <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" id="number" name="aggr_limt" placeholder="Aggregate Limit" value="{{$authority->aggregate_limit}}"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">Job Duration (Years) <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Job Duration"  name="job_dur" value="{{$authority->job_duration}}"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="warranty_dur" class="form-label">Warranty Period (Years) <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" id="warranty_dur" name="warranty_dur" placeholder="Warranty Period" value="{{$authority->warranty_duration}}"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Hazmat" class="form-label">Hazmat/Asbestos<span class="req text-danger">*</span></label>
                                        <select name="hazmat" class="form-select select2selector" id="Hazmat">
                                            <option value="1" @selected($authority->hazmat == 1) >Yes</option>
                                            <option value="0" @selected($authority->hazmat == 0) >No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="design_build" class="form-label">Design Build<span class="req text-danger">*</span></label>
                                        <select name="design_build" class="form-select select2selector">
                                            <option value="1" @selected($authority->design_build == 1)>Yes</option>
                                            <option value="0" @selected($authority->design_build == 0)>No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="curtain" class="form-label">Curtain Wall <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Curtain Wall" id="curtain" name="curtain"
                                               value="{{$customer->curtain}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="glazing" class="form-label">Glazing<span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="glazing" id="glazing" name="glazing"
                                               value="{{$customer->glazing}}" >
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Solar" class="form-label">Solar <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Solar" id="solar" name="solar"
                                               value="{{$customer->solar}}" >
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="minim_bid" class="form-label">Bid Spread % <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Minimum Bid" id="minim_bid" name="minim_bid" value="{!! $authority->minimum_bid !!}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="territory" class="form-label">Territory <span class="req text-danger">*</span></label>
                                        <select name="territory" class="form-select select2selector">
                                            <option value="0">Select State</option>
                                            @foreach($provinces as $row)
                                                <option value="{!! $row->id !!}" @selected($authority->territory == $row->id)>{!! $row->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h6 class="accordion-header mt-0" id="headingFive" style="background-color: #edf7fd;padding:15px">
                            <strong>Additional LOA Provisions </strong>
                        </h6>
                    </div>
                    <div class="panel-body">
                        <div class="accordion-body">
                            <div class="card mb-4 mt-2 question-row" data-index="{{ $key }}">
                                <div class="card-body">
                                    <div class="row" id="questions-container">
                                        @foreach($questions as $key => $item)
                                            <div class="{{count($questions) > 1 ? "col-md-6" : "col-md-12"}}  questions mb-3" id="question-row-{{ $key }}">
                                                <label for="questions_{{ $key }}" class="form-label w-100">Additional LOA Provision {{ $key+1 }} <i class="fa fa-trash remove-question text-danger float-right"></i></label>
                                                <input type="text" class="form-control" placeholder="Additional LOA Provision" id="questions_{{ $key }}" name="questions[{{ $key }}]" value="{{ $item->question }}">
                                                <input type="hidden" name="question_id[{{ $key }}]" value="{{ $item->id }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="btn btn-success btn-xs mt-2" type="button" id="add-question">+ Add More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.stepform.footer',['last' => true])
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
<script src="{!! asset('assets/js/jquery-ui.min.js') !!}?v=11"></script>
<script src="{!! asset('assets/js/jquery.signature.js') !!}?v=11"></script>
<script>
    $(document).ready(function(){
       var surety_val   =   $('.ajax_load_select').val();
        // alert(surety_val);
    });
</script>

<script type="module">
    $(document).find('.select2selector').select2();
    $(document).ready(function() {
        MultiStepFormJs(); // Include
        $(document).on('click','#add-indemnitor',function(e){
            e.preventDefault();
            var itemCount = $('div.item-row').length;
            itemCount++;
            $.ajax({
                url: '/append_indemnitor', // Replace with your route
                method: 'GET',
                data:{'itemCount':itemCount},
                success: function(response) {
                    if(response){
                        $('.indemnitors_list').append(response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).on('click','.remove-indemnitor',function (e){
            $(this).parents('.item-row').remove();
        });




        let questionIndex = {{ count($questions) }}; // Initialize index from the count of existing questions

        // Add a new question field dynamically
        $('#add-question').click(function () {
            addQuestionField('', questionIndex);
            questionIndex++;
        });

        // Function to append a new question field
        function addQuestionField(value, index) {
            var length = $(document).find('.questions').length + 1;
            $(document).find('.questions:eq(0)').removeClass('col-md-12').addClass('col-md-6');
            $(document).find('.questions:eq(0)').find('.form-label').text('Additional LOA Provision 1');
            const newQuestionField = `
                     <div class="col-md-6 mb-3 questions" id="question_${questionIndex}">
                        <label for="questions_${questionIndex}" class="form-label w-100">Additional LOA Provision ${length}<i class="fa fa-trash remove-question text-danger float-right" data-index="${questionIndex}"></i> </label>
                        <input type="text" class="form-control" placeholder="Additional LOA Provision" id="questions_${questionIndex}" name="questions[${questionIndex}]">
                    </div>`;
            $('#questions-container').append(newQuestionField);
            questionIndex++;
        }
        $(document).on('click', '.remove-question', function () {
            $(this).closest('.questions').remove();
        });

        $(document).ready(function () {
                // Format the input field value on page load (edit case)
                $('.monetary').each(function () {
                    let rawValue = $(this).val(); // Get the raw value
                    if (rawValue) {
                        let formattedValue = formatAsCurrency(rawValue);
                        $(this).val(formattedValue); // Display formatted value
                    }
                });

                // Update the format dynamically as the user types
                $('.monetary').on('input', function () {
                    let rawValue = $(this).val().replace(/[^0-9.]/g, ''); // Remove non-numeric characters
                    if (rawValue) {
                        let formattedValue = formatAsCurrency(rawValue);
                        $(this).val(formattedValue);
                        $(this).data('numericValue', rawValue); // Store raw value for backend processing
                    } else {
                        $(this).val(''); // Clear the field if empty
                        $(this).data('numericValue', ''); // Clear the numeric value storage
                    }
                });

                // Function to format the number as currency
                function formatAsCurrency(value) {
                    value = value.replace(/[^0-9.]/g, ''); // Remove non-numeric characters
                    let parts = value.split('.');
                    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Add commas
                    return '$' + (parts.length > 1 ? parts[0] + '.' + parts[1].substring(0, 2) : parts[0]); // Format as $1,234.56
                }
            });




    });
</script>

