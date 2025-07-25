<x-guest-layout>
    <div class="flex gap-4 m-4 md:w-[1000px] w-[100%] max-md:flex-col max-md:items-center bg-white rounded-lg py-[4rem] px-[2rem]">
        <div>
            <h1 class="text-4xl max-md:text-2xl space-x-2 font-bold mb-4">💰 Take control of your money. Simplify your future.</h1>
            <p>Track every expense, visualize your income, and build better habits—all in one simple personal finance tracker.</p>
            <button onclick="window.location='{{ route('register') }}'" class="blue-btn !my-4">Get Started</button>
        </div>
        <div>
            <img class="w-[100%] object-cover rounded-md" src="{{asset('asset\hero.jpg')}}" alt="hero image">
        </div>
    </div>
</x-guest-layout>