<div class="d-flex justify-content-between">
    @if($isShowable)
    <a 
        class="btn btn-sm btn-light bg-gradient" 
        href="{{ route($route . '.show', $value) }}">
        {{ __('table.show') }}
    </a>
    @endif
    @if($isEditable)
    <a 
        class="btn btn-sm btn-light bg-gradient" 
        href="{{ route($route . '.edit', $value) }}">
        {{ __('table.edit') }}
    </a>
    @endif
    @if($isDeletable)
    <form 
        action="{{ route($route . '.destroy', $value) }}" 
        method="post">
        @method('DELETE')
        @csrf
        <button 
            type="submit" 
            class="btn btn-sm btn-light bg-gradient">
            {{ __('table.delete') }}
        </button>
    </form>
    @endif
</div>