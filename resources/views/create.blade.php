<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="antialiased font-sans bg-gray-200 overflow-hidden">
  <div class="p-8">
    <div class="mx-auto w-full max-w-xl">
      <form method="POST" action="/" enctype="multipart/form-data" class="relative">
        @csrf

        <div class="mb-4">
          <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
          <div class="relative mt-2 rounded-md shadow-sm">
            <input type="text" name="content" id="content" class="block w-full rounded-md border-0 py-1.5 pr-10 ring-1 ring-inset  focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 @error('content') text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 @enderror" placeholder="Your content to share" value="{{old('content')}}" @error('content') aria-invalid="true" @enderror aria-describedby="content-error">
            @error('content')
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
              <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
              </svg>
            </div>
            @enderror
          </div>

          @error('content')
          <p class="mt-2 text-sm text-red-600" id="content-error">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
          <div class="relative">
            <input type="file" name="image" id="image" class="block w-full border-0 py-1.5 pr-10 sm:text-sm sm:leading-6" @error('content') aria-invalid="true" @enderror aria-describedby="image-error">
            @error('image')
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
              <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
              </svg>
            </div>
            @enderror
          </div>

          @error('image')
          <p class="text-sm text-red-600" id="image-error">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
