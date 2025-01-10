<div style="position: relative; width: 95vw; height: 40vh; margin: 0 auto; border-radius: 15px; overflow: hidden; transition: all 0.3s ease-in-out;" class="shadow-xl transition hover:border-pink-500/10 hover:shadow-pink-500/10 bg-[#2A2B2D]">
    <img src="{{ asset($image) }}"
      alt="Students"
      style="width: 100%; height: 100%; object-fit: cover;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>

    <h1 class="text-3xl font-extrabold text-white sm:text-5xl"
      style="position: absolute; bottom: 60px; right: 20px; text-align: right; z-index: 2;">
      <a href="#">{{ $title }}<br>
        <strong class="bg-gradient-to-r from-[#D808C1] via-[#960B91] to-[#960B91] bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl hover:scale-[1.02] transition-transform duration-300">
          {{ $subtitle }}
        </strong></a>
    </h1>
</div>