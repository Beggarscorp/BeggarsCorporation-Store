<footer class="bg-[#262F36]">
    <div class="container mx-auto pt-8">
        <div class="md:grid md:grid-cols-3 pb-8">
            <div>
                <div class="w-fit m-auto">
                    <div class="text-2xl font-bold text-white">Important links</div>
                    <div class="flex flex-col space-y-2 text-gray-400 mt-4">
                        <a wire:navigate href="/" class="hover:underline">Home</a>
                        <a wire:navigate href="{{ route('shop') }}" class="hover:underline">Shop</a>
                        <a href="https://beggarscorporation.com/about-us" target="_blank" class="hover:underline">About us</a>
                        <a wire:navigate href="{{ route('terms-and-conditions') }}" class="hover:underline">Terms and Conditions</a>
                        <a wire:navigate href="{{ route('privacy-policy') }}" class="hover:underline">Privacy Policy</a>
                        <a wire:navigate href="{{ route('shipping-and-delivery-policy') }}" class="hover:underline">Shipping and Delivery Policy</a>
                        <a wire:navigate href="{{ route('cancellation-and-refund-policy') }}" class="hover:underline">Cancellation and Refund Policy</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="w-fit m-auto">
                    <div class="flex">
                        <img src="{{ asset('assets/images/logos/footer-logo-1.png') }}" alt="Footer Logo">
                        <img src="{{ asset('assets/images/logos/footer-logo-2.png') }}" alt="Footer Logo">
                    </div>
                </div>
            </div>
            <div>
                <div class="w-fit m-auto">
                    <div class="text-2xl font-bold text-white">Contact Information</div>
                    <div class="flex flex-col space-y-5 text-gray-400 mt-4">
                        <span><i class="fa-solid fa-location-dot"></i> B 12, Navodit Nagar, Tulsipur, Mahmoorganj, Varanasi-221010</span>
                        <span><i class="fa fa-phone" aria-hidden="true"></i> +91 85956 17274</span>
                        <span><i class="fa fa-envelope" aria-hidden="true"></i> office@beggarscorporation.com</span>
                </div>
                <div class="social-media-links text-gray-400 flex space-x-4 text-xl mt-6">
                    <div><a href="https://instagram.com" target="_blank"><i class="fa-brands fa-instagram hover:scale-110"></i></a></div>
                    <div><a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook hover:scale-110"></i></a></div>
                    <div><a href="https://twitter.com" target="_blank"><i class="fa-brands fa-twitter hover:scale-110"></i></a></div>
                    <div><a href="https://linkedin.com" target="_blank"><i class="fa-brands fa-linkedin hover:scale-110"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center border-t border-gray-700 py-3 text-gray-400">
        <p class="text-sm">© <?= date('Y') ?> Beggars Corporation | Humanomics Private Limited, India</p>
    </div>
</footer>