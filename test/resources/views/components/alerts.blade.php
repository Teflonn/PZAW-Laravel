@if (session()->has('success'))
	<div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
    	<div>
        	{{ session('success') }}
    	</div>
	</div>
@endif

@if (session()->has('warning'))
	<div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700" role="alert">
    	<div>
        	{{ session('warning') }}
    	</div>
        </div>
@endif

@if (session()->has('error'))
	<div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
    	<div>
        	{{ session('error') }}
    	</div>
	</div>
@endif
