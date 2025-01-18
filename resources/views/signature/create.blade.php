<x-custom-modal-component>
    <x-slot name="title">
        {{ __('Create Seal/Signature') }}
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

            .container {
                padding-top: 50px;
                margin: auto;
            }
        </style>
        <div class="modal-body">
            <form action="{{route('signature.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row relative">
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Name<span class="req text-danger"> *</span></label>
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                    </div>

                    <div class="col-md-12 mb-0">
                        <label for="bond_id" class="form-label">Select Bond (Customer Name- Project Name) <span class="req text-danger"> *</span></label>
                        <select  placeholder="Select Bond" class="form-select select2selector" id="bond_id" name="bond_id">
                            <option value="0"> Select Bond</option>
                            @if($bonds)
                                @foreach($bonds as $item)
                                    <option value="{{$item->id}}">{{$item->customer->user->name ?? ''}} - {{$item->name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-12 mb-0 mt-3">
                        <label for="attachment_type" class="form-label">Attachment Type<span class="req text-danger"> *</span></label>
                        <select  placeholder="Select Attachment Type" class="form-select select2selector" id="attachment_type" name="attachment_type">
                            <option value="0"> Select Attachment Type</option>
                            @foreach(attachment_types() as $key => $item)
                                <option value="{{$key}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="file" class="form-label">Attachment<span class="req text-danger"> *</span></label>
                        <input type="file" class="form-control" id="file" name="attachment" placeholder=""/>
                    </div>

                </div>

                <button type="button" class="form_submit btn btn-success mt-3">Submit</button>
                <button type="button" class="btn btn-primary cancel-btn mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>

            </form>
        </div>
    </x-slot>
</x-custom-modal-component>
<script type="module">
    $(document).find('.select2selector').select2(
        {
            dropdownParent: $('#default_modal'),
        });
</script>

