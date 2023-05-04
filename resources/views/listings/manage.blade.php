<x-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    @unless (count(auth()->user()->listings) == 0)
                        @foreach (auth()->user()->listings as $listing)
                            <x-manage-card :listing="$listing" />
                        @endforeach
                    @else
                        <p>You have no listings currently</p>
                    @endunless
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
