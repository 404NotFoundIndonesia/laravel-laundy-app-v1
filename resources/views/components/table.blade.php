<x-alert />
<div class="card">
  <div class="card-body">
    <form action="{{ url()->current() }}" method="get">
        <input 
            type="hidden" 
            name="num_page" 
            value="{{ $numPage ?? 10 }}">
        <div class="input-group mb-3">
            <input 
                type="text" 
                class="form-control" 
                name="search" 
                placeholder="{{ __('table.placeholder') }}"
                value="{{ $search }}">
            <button 
                class="btn btn-outline-secondary" 
                type="submit">
                {{ __('table.search') }}
            </button>
            @if($create)
            <a 
                href="{{ $create }}" 
                class="btn btn-dark bg-gradient">
                {{ __('table.create') }}
            </a>
            @endif
        </div>
    </form>
    <table class="table table-hover">
        <thead>
            <tr>
                @foreach($columns as $column)
                <th scope="col">
                    {{ __($column) }}
                </th>
                @endforeach
            </tr>
        </thead>
        {{ $slot }}
    </table>
    {!! $datum->appends([
        'search' => $search,
        'num_page' => $numPage,
        ])->links() !!}
  </div>
</div>