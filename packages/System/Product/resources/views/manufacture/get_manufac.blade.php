{{-- product manufacture id --}}
<div class="form-group">
    <label>Hãng sản xuất</label>
    <select  class="form-control" name="manufacture_id">
        <option > Chọn hãng sản xuất</option>
        @foreach($manufactures as $manufacture)
            <option value="{{ $manufacture->id  }}" @if(isset($manufacture_id))  {{ (  $manufacture_id == $manufacture->id ) ? 'selected="selected"' : ''  }} @endif> {{ $manufacture->name  }}</option>
        @endforeach
    </select>
</div>
