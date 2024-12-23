<x-app-layout>
    <x-slot name="title">
        {{ __('Add Customer') }}
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
                    <div class="accordion-body">
                        <div class="card mb-4 mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">Account Name <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="address" class="form-label">Address <span class="req text-danger">*</span></label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Address" rows="1"></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="address2" class="form-label">Address 2<span class="req text-danger">*</span></label>
                                        <textarea class="form-control" id="address2" name="address2" placeholder="Address 2" rows="1"></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">State<span class="req text-danger">*</span></label>
                                        <select target='select[name="city_id"]' placeholder="Select City"
                                                url="{!! route('state.get-cities') !!}" params="province_id" name="province_id"
                                                class="form-select changeInputMws input_province_id select2selector">
                                            <option value="0">Select State</option>
                                            @foreach($provinces as $row)
                                                <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="city_id" class="form-label">City<span class="req text-danger">*</span></label>
                                        <select name="city_id" class="form-select city_id_selector select2selector">
                                            <option value="0">Select City</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="zip" class="form-label">Zip <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" maxlength="5" pattern="\d{5}"/>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="primary_contact" class="form-label">Primary Contact <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control phoneNo" id="primary_contact" name="primary_contact"
                                               maxlength="12" placeholder="000-000-0000"/>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="phone" class="form-label">Phone <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control phoneNo" id="phone" name="phone"  maxlength="12" placeholder="000-000-0000"/>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="email" class="form-label">Email <span class="req text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"/>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="corporation_type" class="form-label">Corporation Type <span class="req text-danger">*</span></label>
                                        <select  placeholder="Select Corporation Type" class="form-select select2selector" id="corporation_type" name="corporation_type">
                                            <option value="0"> Select Corporation Type</option>
                                            @foreach(corporation_types() as $key => $position)
                                                <option value="{{$key}}">{{$position}}</option>
                                            @endforeach
                                        </select>
                                    </div>





                                    <div class="col-md-4 mb-3">
                                        <label for="size" class="form-label">Average Project Size <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control monetary" id="size" name="average_size" placeholder="$0.00" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="largest_size" class="form-label">Largest Project Size <span class="req text-danger">*</span></label>
                                        <input type="test" class="form-control monetary" id="largest_size" name="largest_size" placeholder="$0.00" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="backlog" class="form-label">Largest Backlog <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control monetary" id="backlog" name="backlog" placeholder="$0.00" />
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
                        <div class="card mb-4 mt-2 item-row">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mt-2 mb-2">
                                        <label for="personal_indemnitor" class="form-label ">  Personal Indemnitor(s)<span class="req text-danger">*</span></label>
                                        <textarea name="indemnitors[1][personal]" class="form-control" rows="2" required='required'>  </textarea>
                                    </div>
                                    <div class="col-6 mt-2 mb-2">
                                        <label for="corporate_indemnitor" class="form-label ">   Corporate Indemnitor(s)<span class="req text-danger">*</span></label>
                                        <textarea name="indemnitors[1][corporate]" class="form-control" rows="2" required='required'>  </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <option value="{!! $insurer['id'] !!}"> {!! $insurer->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                        {{--                                    <x-surety-form  />--}}
                                    </div>
                                    <div class="suretyDetails">
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
                                    <div class="col-md-4 mb-3">
                                        <label for="start_date" class="form-label ">Effective Date <span class="req text-danger">*</span> </label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Expiration Date"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="exp_date" class="form-label">Expiration Date <span class="req text-danger">*</span></label>
                                        <input type="date" class="form-control" id="exp_date" name="exp_date" placeholder="Expiration Date"/>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Single Project Limit <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Single Job Limit" name="single_limt">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="number" class="form-label">Aggregate Limit <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" id="number" name="aggr_limt" placeholder="Aggregate Limit"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">Job Duration (Years) <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Job Duration"  name="job_dur">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="warranty_dur" class="form-label">Warranty Period (Years) <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" id="warranty_dur" name="warranty_dur" placeholder="Warranty Period"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Hazmat" class="form-label">Hazmat/Asbestos<span class="req text-danger">*</span></label>
                                        <select name="hazmat" class="form-select select2selector" id="Hazmat">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="design_build" class="form-label">Design Build<span class="req text-danger">*</span></label>
                                        <select name="design_build" class="form-select select2selector">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>


                                    <div class="col-md-4 mb-3">
                                        <label for="curtain" class="form-label">Curtain Wall <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Curtain Wall" id="curtain" name="curtain">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="glazing" class="form-label">Glazing<span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="glazing" id="glazing" name="glazing">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="Solar" class="form-label">Solar <span class="req text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Solar" id="solar" name="solar">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">Bid Spread % <span class="req text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Minimum Bid" id="name" name="minim_bid">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="territory" class="form-label">Territory <span class="req text-danger">*</span></label>
                                        <select name="territory" class="form-select select2selector">
                                            <option value="0">Select State</option>
                                            @foreach($provinces as $row)
                                                <option value="{!! $row->id !!}">{!! $row->name !!}</option>
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
                            <div class="card mb-4 mt-2">
                                <div class="card-body">
                                    <div class="row" id="questions-container">
                                        <div class="col-md-12 mb-3 questions" id="question_0">
                                            <label for="questions_0" class="form-label">Additional LOA Provision</label>
                                            <input type="text" class="form-control" placeholder="Additional LOA Provision" id="questions_0" name="questions[0]">
                                        </div>
                                        <div class="col-md-1" style="margin-top: 31px; display: none">
                                            <button type="button" class="btn btn-danger btn-sm remove-question" data-index="0">Remove</button>
                                        </div>
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

        let questionIndex = 1;
        $('#add-question').click(function () {
            var length = $(document).find('.questions').length + 1;
            $(document).find('.questions:eq(0)').removeClass('col-md-12').addClass('col-md-6');
            $(document).find('.questions:eq(0)').find('.form-label').text('Additional LOA Provision 1');
            const newQuestionField = `
                     <div class="col-md-6 mb-3 questions" id="question_${questionIndex}">
                        <label for="questions_${questionIndex}" class="form-label w-100">Additional LOA Provision ${length} <i class="fa fa-trash remove-question text-danger float-right" data-index="${questionIndex}"></i> </label>
                        <input type="text" class="form-control" placeholder="Additional LOA Provision" id="questions_${questionIndex}" name="questions[${questionIndex}]">
                    </div>`;
            $('#questions-container').append(newQuestionField);
            questionIndex++;
        });

        // Click event for removing question input field
        $(document).on('click', '.remove-question', function () {
            $(this).closest('.questions').remove();
        });

        $('.monetary').on('input', function () {
            let value = $(this).val().replace(/[^0-9.]/g, '');
            if (value) {
                let parts = value.split('.');
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                value = parts.length > 1 ? parts[0] + '.' + parts[1].substring(0, 2) : parts[0];
                $(this).val('$' + value);
            } else {
                $(this).val(''); // Clear the field if the value is empty
            }
        });



    });
</script>
