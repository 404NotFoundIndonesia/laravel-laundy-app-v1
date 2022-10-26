<x-alert />
<div class="card">
  <div class="card-body">
    <form action="{{ $route }}" method="post">
        @csrf
        {{ $slot }}
        <x-button 
            name="{{ __('form.save') }}"
            type="submit" 
            size="block"
        />
    </form>
  </div>
</div>