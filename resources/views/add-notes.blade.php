<div>
    <form method="POST" action="{{ request()->routeIs('add-note') ? route('save-note') : route('save-edit-note', $data->id)}}">
        <div class="title">
            <label for="title">
                Title
            </label>
            <input type="text" id="title" name="title" value="{{ request()->routeIs('edit-note') ? $data->title : ''}}">
        </div>
        <div class="content">
            <label for="">Content</label>
            <textarea name="content" id="" cols="30" rows="10">{{ request()->routeIs('edit-note') ? $data->content : '' }}</textarea>
        </div>
        @csrf
        @if (request()->routeIs('add-note'))
            @method('POST')
        @elseif (request()->routeIs('edit-note'))
            @method('PUT')
        @endif
        <input type="submit" value="SUBMIT">
    </form>
</div>