@props(['itemCount', 'indemnitor'])
<div class="card mb-4 mt-2 item-row">
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="id" value="{{$indemnitor->id??''}}">
            <div class="col-6 mt-2 mb-2">
                <label for="personal_indemnitor" class="form-label ">  Personal Indemnitor(s) {{$itemCount}}<span class="req text-danger">*</span></label>
                <textarea name="indemnitors[{{$itemCount}}][personal]" class="form-control" rows="2" required='required'> {{$indemnitor->personal??''}} </textarea>
            </div>
            <div class="col-6 mt-2 mb-2">
                <label for="corporate" class="form-label w-100">   Corporate Indemnitor(s) {{$itemCount}}<span class="req text-danger">*</span>
                    <i class="fa fa-trash remove-indemnitor text-danger float-right"></i>
                </label>
                <textarea name="indemnitors[{{$itemCount}}][corporate]" class="form-control" rows="2" required='required'> {{$indemnitor->corporate??''}}  </textarea>
            </div>
        </div>
    </div>
</div>