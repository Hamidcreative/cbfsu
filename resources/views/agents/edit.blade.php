<x-custom-modal-component>
    <x-slot name="title">
        {{ __('Edit Agent') }}
    </x-slot>
    <x-slot name="body">
        <style>
            .field-icon {
                top: 40px;
                right: 30px;
                position: absolute;
                z-index: 2;
                cursor: pointer;
            }
            .container{
                padding-top:50px;
                margin: auto;
            }
        </style>
        <div class="modal-body">
            <form action="{{route('agent.update')}}" method="POST">
                @csrf
                <input type="hidden" class="form-control" value="{{isset($agent->id) ? $agent->id: '' }}" id="id" name="id">

                <div class="row">

                    <div class="form-group mb-6 col-md-12">
                        <label for="email" class="form-label">Name*</label>
                        <input type="text" class="form-control" name="name" placeholder="Name"
                               value="{{isset($agent->user->email) ? $agent->user->name : ''}}"/>
                    </div>

                    <div class="form-group mb-6 col-md-12">
                        <label for="email" class="form-label"> Email address* </label>
                        <input type="email" class="form-control" name="email" placeholder="Email"
                               value="{{isset($agent->user->email) ? $agent->user->email : ''}}"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="Phone" class="form-label">Phone*</label>
                        <input type="phone" class="form-control phoneNo" id="Phone" name="phone"  maxlength="12" placeholder="000-000-0000"
                               value="{{isset($agent->phone) ? $agent->phone : ''}}"/>
                    </div>
                    <div class="col-md-12 mb-3 "  toggle="password-parent" style="position: relative">
                        <label class=" control-label">Password</label>
                        <input id="password-field" type="password" class="form-control" name="password">
                        <span class="fa fa-fw fa-eye-slash field-icon toggle-password"> </span>
                    </div>

                    <div class="col-md-12 mb-2 " toggle="password-parent"  style="position: relative">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control password" name="password_confirmation">
                        <span class="fa fa-fw fa-eye-slash field-icon toggle-password"> </span>
                    </div>
                </div>
                <button type="button" class="form_submit btn btn-success">Update</button>
                <button type="button" class="btn btn-success cancel-btn " data-bs-dismiss="modal" aria-label="Close">Cancel</button>

            </form>
        </div>
        <script type="module">
        </script>
    </x-slot>
</x-custom-modal-component>
<script type="module">
    $(document).find('#role').select2(
        {
            dropdownParent: $('#default_modal'),
        });
</script>
