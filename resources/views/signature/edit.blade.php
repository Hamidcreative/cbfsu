<x-custom-modal-component>
    <x-slot name="title">
        {{ __('Edit Seal/Signature') }}
    </x-slot>

    <x-slot name="body">
        <div class="modal-body">
            <form action="{{route('signature.update')}}" method="POST">
                @csrf
                <div class="row relative">
                    <input type="hidden" class="form-control" placeholder="Name"  value="{!! $signature->id !!}" name="id">

                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Name<span class="req text-danger"> *</span></label>
                        <input type="text" class="form-control" placeholder="Name" id="name" value="{!! $signature->name !!}" name="name">
                    </div>

                    <div class="col-md-12 mb-0">
                        <label for="bond_id" class="form-label">Select Bond (Customer Name- Project Name) <span class="req text-danger"> *</span></label>
                        <select  placeholder="Select Bond" class="form-select select2selector" id="bond_id" name="bond_id">
                            <option value="0"> Select Bond</option>
                            @foreach($bonds as $item)
                                <option value="{{$item->id}}" @selected($item->id==$signature->bond_id)>{{$item->customer->user->name??''}} - {{$item->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mb-0 mt-3">
                        <label for="attachment_type" class="form-label">Attachment Type<span class="req text-danger"> *</span></label>
                        <select  placeholder="Select Attachment Type" class="form-select select2selector" id="attachment_type" name="attachment_type">
                            <option value="0"> Select Attachment Type</option>
                            @foreach(attachment_types() as $key => $item)
                                <option value="{{$key}}" @selected($key==$signature->attachment_type)>{{$item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="file" class="form-label">Attachment<span class="req text-danger"> *</span></label>
                        <input type="file" class="form-control" id="file" name="attachment" value="{!! $signature->attachment !!}" placeholder=""/>
                        <div class="mt-3">
                            @if(isset($signature->attachment))
                                @if(pathinfo($signature->attachment, PATHINFO_EXTENSION) === 'pdf')
                                    <!-- Display a PDF icon and a link to the PDF -->
                                    <a href="{{ asset('images/signature/' . $signature->attachment) }}" target="_blank">
                                        <img src="{{ asset('images/pdf.svg') }}" alt="PDF" style="width: 40px; height: 40px;">
                                        View File
                                    </a>
                                @else
                                    <!-- If it's not a PDF, display the image -->
                                    <img src="{{ asset('images/bonds/'.$signature->attachment) }}" alt="Attachment" style="max-width: 100%;">

                                @endif
                                <input type="hidden" name="attachment" value="{{ $signature->attachment ?? '' }}">

                            @endif
                        </div>

                    </div>
                </div>
                <button type="button" class="form_submit btn btn-success mt-2">Submit</button>
                <button type="button" class="btn btn-primary cancel-btn mt-2" data-bs-dismiss="modal" aria-label="Close">Cancel
                </button>
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

